<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Routine;
use App\Models\Section;
use App\Models\Syllabus;
use App\Models\User;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Exam;
use App\Models\Classes;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherDashboard()
    {
        if (auth()->user()->role_id == 2) {
            return view('teacher.dashboard');
        } else {
            redirect()->route('login')
                ->with('error', 'You are not logged in.');
        }
    }

    //Teacher Profile
    public function profile()
    {
      return view('teacher.profile.view');
    }

  //start not permitted
    public function profile_edit(string $id)
    {
      $parent = User::find($id);
      return view('parent.profile.update', compact('parent'));
    }
    public function profile_update(Request $request, string $id)
    {
      $data = $request->all();

      if (!empty($data['photo'])) {
        $file = $data['photo'];
        $filename = time() . '-' . $file->getClientOriginalExtension();
        $file->move('parent-images/', $filename);
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
      return redirect()->route('parent.parent')->with('success', 'Profile Updated Successfully');
    }
  //end not permitted

  //Subject List
    public function subjectList()
    {
      $subjects = Subject::get()->where('school_id', auth()->user()->school_id);
      return view('teacher.subject.subject_list', ['subjects' => $subjects]);
    }

  //Geade List
    public function gradeList()
    {
      $grades = Grade::get()->where('school_id', auth()->user()->school_id);
      return view('teacher.grade.grade_list', ['grades' => $grades]);
    }

  //Routine List
  public function routine()
  {
    $routine = Routine::get()->where('school_id', auth()->user()->school_id);
    return view('teacher.routine.routine', ['routine' => $routine]);
  }

  //Syllabus List
  public function list_of_syllabus()
  {
    $syllabus = Syllabus::get()->where('school_id', auth()->user()->school_id);
    return view('teacher.syllabus.syllabus', ['syllabuses' => $syllabus]);
  }

  //Exam List
  public function examList()
  {
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $exams = Exam::get()->where('school_id', auth()->user()->school_id);
    return view('teacher.examination.exam_list', ['exams' => $exams, 'classes' => $classes]);
  }

  //Marks List
  public function marks()
  {
    $marks = Mark::get()->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', auth()->user()->school_id);
    $subjects = Subject::get()->where('school_id', auth()->user()->school_id);

    return view('teacher.marks.marks_list', ['marks' => $marks, 'classes' => $classes, 'sections' => $sections, 'subjects' => $subjects]);
  }
}
