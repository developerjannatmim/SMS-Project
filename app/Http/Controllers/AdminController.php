<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
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
	public function student_list(Request $request)
	{
		$class_id = $request['class_id'] ?? "";

		$users = User::where('users.school_id', auth()->user()->school_id)
        ->where('users.role_id', 3);

		if($class_id == 'all' || $class_id != ""){
            $users->where('class_id', $class_id);
        }

		$students = $users->join('roles', 'users.role_id', '=', 'roles.id')->select('roles.*')->paginate(10);

		$classes = Classes::get()->where('school_id', auth()->user()->school_id);
		
		return view('admin.student.student_list', compact('users', 'classes', 'class_id', 'students'));
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

//Grades
public function gradeList()
{
		$grades = Grade::get()->where('school_id', auth()->user()->school_id);
		return view('admin.grade.grade_list', ['grades' => $grades]);
}

public function createGrade()
{
		return view('admin.grade.add_grade');
}

public function gradeCreate(Request $request)
{
		$data = $request->all();

		$duplicate_grade_check = Grade::get()->where('name', $data['grade'])->where('school_id', auth()->user()->school_id);

		if(count($duplicate_grade_check) == 0) {
				Grade::create([
						'name' => $data['grade'],
						'grade_point' => $data['grade_point'],
						'mark_from' => $data['mark_from'],
						'mark_upto' => $data['mark_upto'],
						'school_id' => auth()->user()->school_id,
				]);

				return redirect()->back()->with('message','You have successfully create a new grade.');

		} else {
				return back()
				->with('error','Sorry this grade already exists');
		}
}

public function editGrade(string $id)
{
		$grade = Grade::find($id);
		return view('admin.grade.edit_grade', ['grade' => $grade]);
}

public function gradeUpdate(Request $request, $id)
{
		$data = $request->all();
		Grade::where('id', $id)->update([
				'name' => $data['grade'],
				'grade_point' => $data['grade_point'],
				'mark_from' => $data['mark_from'],
				'mark_upto' => $data['mark_upto'],
				'school_id' => auth()->user()->school_id,
		]);
		
		return redirect()->back()->with('message','You have successfully update grade.');
}

public function gradeDelete($id)
{
		$grade = Grade::find($id);
		$grade->delete();
		$grades = Grade::get()->where('school_id', auth()->user()->school_id);
		return redirect()->back()->with('message','You have successfully delete grade.');
}
}