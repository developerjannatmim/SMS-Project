<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\School;

class AdminController extends Controller
{
	public function adminDashboard()
	{
			if(auth()->user()->role_id != "") {
					return view('admin.dashboard');
			} else {
					redirect()->route('login')
							->with('error','You are not logged in.');
			}
	}
	
	//Student
	public function student_list()
	{
		$students = User::get();
		return view('admin.student.student_list', compact('students'));
	}

	public function student_create()
	{
		$classes = Classes::get()->where('school_id', auth()->user()->school_id);
		return view('admin.student.add_student',['classes' => $classes]);
	}

	public function student_store(Request $request)
	{
		$data = $request->all();

		if (!empty($data['photo'])) {
			$file = $data['photo'];
			$filename = time() . '-' . $file->getClientOriginalExtension();
			$file->move('/images/student/', $filename);
			$photo = $filename;
		}else{
			$photo = '';
		}

		$info = array(
			'gender' => $data['gender'],
			'blood_group' => $data['blood_group'],
			'birthday' => $data['birthday'],
			'phone' => $data['phone'],
			'address' => $data['address'],
			'photo' => $photo
		);

		$data['user_information'] = json_encode($info);
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password,
			'role_id' => '3',
			'school_id' => auth()->user()->school_id
		]);

		return redirect()->back()->with('success', 'Student Added Successfully');
	}


	public function student_edit($id)
	{
		//
	}

	public function student_update(Request $request, $id)
	{
		//
	}

	public function student_destroy($id)
	{
		//
	}

	//School
	public function school_list()
	{
		$school = School::get();
		return view('admin.school.school_list', compact('school'));
	}

	public function school_create()
	{
		return view('admin.school.add_school');
	}

	public function school_store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'school_info' => 'required',
			'status' => 'required'
		]);

		$student = new School;
		$student = School::create([
			'title' => $request->title,
			'email' => $request->email,
			'phone' => $request->phone,
			'address' => $request->address,
			'school_info' => $request->school_info,
			'status' => $request->status
		]);

		$student->save();
		return redirect()->route('admin.school.school_list')->with('success', 'School Added Successfully');
	}


	public function school_edit($id)
	{
		//
	}

	public function school_update(Request $request, $id)
	{
		//
	}

	public function school_destroy($id)
	{
		//
	}
}