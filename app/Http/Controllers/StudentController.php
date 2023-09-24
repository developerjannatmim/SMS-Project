<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function studentDashboard()
    {
        if (auth()->user()->role_id == 3) {
            return view('student.dashboard');
        } else {
            redirect()->route('login')
                ->with('error', 'You are not logged in.');
        }
    }

    // Student Profile
    public function profile()
    {
      return view('student.profile.view');
    }
  
    //start not permitted
    public function profile_edit(string $id)
    {
      $student = User::find($id);
      return view('student.profile.update', compact('student'));
    }
  
    public function profile_update(Request $request, string $id)
    {
      $data = $request->all();
  
      if (!empty($data['photo'])) {
        $file = $data['photo'];
        $filename = time() . '-' . $file->getClientOriginalExtension();
        $file->move('student-images/', $filename);
        $photo = $filename;
      } else {
        $user_info = User::where('id', $id)->value('user_information');
        $exsisting_filename = json_decode($user_info)->photo;
        if ($exsisting_filename !== '') {
          $photo = $exsisting_filename;
        } else {
          $photo = '';
        }
      }
      $user_info = User::where('id', $id)->value('user_information');
  
      $info = array(
        'gender' => $data['gender'],
        'blood_group' => json_decode($user_info)->blood_group,
        'birthday' => date($data['birthday']),
        'phone' => $data['phone'],
        'address' => $data['address'],
        'photo' => $photo
      );
  
      $data['user_information'] = json_encode($info);
      User::where('id', $id)->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'user_information' => $data['user_information']
      ]);
      return redirect()->route('student.student')->with('success', 'Profile Updated Successfully');
    }
    //end not permitted

    //Geade List
    public function gradeList()
    {
      $grades = Grade::get()->where('school_id', auth()->user()->school_id);
      return view('student.grade.grade_list', ['grades' => $grades]);
    }

    //Subject List
    public function subjectList()
    {
      $subjects = Subject::get()->where('school_id', auth()->user()->school_id);
      return view('student.subject.subject_list', ['subjects' => $subjects]);
    }

  //Teacher List
  public function teacherList()
  {
    $teachers = User::get()->where('role_id', 2)->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('student.teacher.teacher_list', compact('teachers', 'classes'));

  }
}
