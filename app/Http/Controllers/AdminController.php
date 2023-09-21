<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\School;

class AdminController extends Controller
{
  public function adminDashboard()
  {
    if (auth()->user()->role_id != '') {
      return view('admin.dashboard');
    } else {
      redirect()->route('login')
        ->with('error', 'You are not logged in.');
    }
  }

  //Student

  public function student_list()
  {
    $students = User::get()->where('role_id', 3)->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', auth()->user()->school_id);
    return view('admin.student.student_list', compact('students', 'classes', 'sections'));
  }

  public function student_create()
  {
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', auth()->user()->school_id);
    return view('admin.student.add_student', ['classes' => $classes, 'sections' => $sections]);
  }

  public function student_store(Request $request)
  {
    $data = $request->all();

    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('students-images/', $filename);
      $photo = $filename;
    } else {
      $photo = '';
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => $data['password'],
      'role_id' => '3',
      'section_id' => $data['section_id'],
      'class_id' => $data['class_id'],
      'school_id' => auth()->user()->school_id,
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Student Added Successfully');
  }

  public function student_edit(string $id)
  {
    $student = User::find($id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', auth()->user()->school_id);
    return view('admin.student.edit_student', ['classes' => $classes, 'sections' => $sections, 'student' => $student]);
  }

  public function student_update(Request $request, string $id)
  {
    $data = $request->all();
    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('/images/student/', $filename);
      $photo = $filename;
    } else {
      $user_info = User::where('id', $id)->value('user_information');
      $exsisting_filename = json_decode($user_info)->photo;
      if($exsisting_filename !== ''){
        $photo = $exsisting_filename;
      }else{
        $photo = '';
      }
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::where('id', $id)->update([
      'name' => $data['name'],
      'email' => $data['email'],
      'section_id' => $data['section_id'],
      'class_id' => $data['class_id'],
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Student Updated Successfully');
  }

  public function student_destroy(string $id)
  {
    $student = User::find($id);
    $student->delete();
    return redirect()->back();
  }

  //Guardian
  public function guardian_list()
  {
    $parents = User::get()->where('role_id', 4)->where('school_id', auth()->user()->school_id);
    return view('admin.parent.parent_list', compact('parents'));

  }

  public function guardian_create()
  {
    $parents = User::get()->where('role_id', 4)->where('school_id', auth()->user()->school_id);
    return view('admin.parent.add_parent', compact('parents'));

  }

  public function guardian_store(Request $request)
  {
    $data = $request->all();
    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('parent-images/', $filename);
      $photo = $filename;
    } else {
      $photo = '';
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'child_name' => $data['child_name'],
      'designation' => $data['designation'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => $data['password'],
      'role_id' => '4',
      'school_id' => auth()->user()->school_id,
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Parent Added Successfully');

  }

  public function guardian_edit(string $id)
  {
    $parent = User::find($id);
    return view('admin.parent.edit_parent', compact('parent'));
  }

  public function guardian_update(Request $request, string $id)
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
      if($exsisting_filename !== ''){
        $photo = $exsisting_filename;
      }else{
        $photo = '';
      }
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'child_name' => $data['child_name'],
      'designation' => $data['designation'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::where('id', $id)->update([
      'name' => $data['name'],
      'email' => $data['email'],
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Parent Updated Successfully');
  }

  public function guardian_destroy(string $id)
  {
    $parent = User::find($id);
    $parent->delete();
    return redirect()->back();
  }

  //Teacher
  public function teacher_list()
  {
    $teachers = User::get()->where('role_id', 2)->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('admin.teacher.teacher_list', compact('teachers', 'classes'));

  }

  public function teacher_create()
  {
    $teachers = User::get()->where('role_id', 2)->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('admin.teacher.add_teacher', compact('teachers', 'classes'));

  }

  public function teacher_store(Request $request)
  {
    $data = $request->all();
    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('teacher-images/', $filename);
      $photo = $filename;
    } else {
      $photo = '';
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'designation' => $data['designation'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => $data['password'],
      'class_id' => $data['class_id'],
      'role_id' => '2',
      'school_id' => auth()->user()->school_id,
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Teacher Added Successfully');

  }

  public function teacher_edit(string $id)
  {
    $teacher = User::find($id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('admin.teacher.edit_teacher', compact('teacher', 'classes'));
  }

  public function teacher_update(Request $request, string $id)
  {
    $data = $request->all();
    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('teacher-images/', $filename);
      $photo = $filename;
    } else {
      $user_info = User::where('id', $id)->value('user_information');
      $exsisting_filename = json_decode($user_info)->photo;
      if($exsisting_filename !== ''){
        $photo = $exsisting_filename;
      }else{
        $photo = '';
      }
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'designation' => $data['designation'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::where('id', $id)->update([
      'name' => $data['name'],
      'email' => $data['email'],
      'class_id' => $data['class_id'],
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Teacher Updated Successfully');
  }

  public function teacher_destroy(string $id)
  {
    $teacher = User::find($id);
    $teacher->delete();
    return redirect()->back();
  }

  //Admin
  public function admin_list()
  {
    $admins = User::get()->where('role_id', 2)->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('admin.admin.admin_list', compact('admins', 'classes'));

  }

  public function admin_create()
  {
    $admins = User::get()->where('role_id', 2)->where('school_id', auth()->user()->school_id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('admin.admin.add_admin', compact('admins', 'classes'));

  }

  public function admin_store(Request $request)
  {
    $data = $request->all();
    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('admin-images/', $filename);
      $photo = $filename;
    } else {
      $photo = '';
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'designation' => $data['designation'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => $data['password'],
      'class_id' => $data['class_id'],
      'role_id' => '2',
      'school_id' => auth()->user()->school_id,
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Admin Added Successfully');

  }

  public function admin_edit(string $id)
  {
    $admin = User::find($id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    return view('admin.admin.edit_admin', compact('admin', 'classes'));
  }

  public function admin_update(Request $request, string $id)
  {
    $data = $request->all();
    if (!empty($data['photo'])) {
      $file = $data['photo'];
      $filename = time() . '-' . $file->getClientOriginalExtension();
      $file->move('admin-images/', $filename);
      $photo = $filename;
    } else {
      $user_info = User::where('id', $id)->value('user_information');
      $exsisting_filename = json_decode($user_info)->photo;
      if($exsisting_filename !== ''){
        $photo = $exsisting_filename;
      }else{
        $photo = '';
      }
    }

    $info = array(
      'gender' => $data['gender'],
      'blood_group' => $data['blood_group'],
      'birthday' => date($data['birthday']),
      'phone' => $data['phone'],
      'address' => $data['address'],
      'designation' => $data['designation'],
      'photo' => $photo
    );

    $data['user_information'] = json_encode($info);
    User::where('id', $id)->update([
      'name' => $data['name'],
      'email' => $data['email'],
      'class_id' => $data['class_id'],
      'user_information' => $data['user_information']
    ]);
    return redirect()->back()->with('success', 'Admin Updated Successfully');
  }

  public function admin_destroy(string $id)
  {
    $admin = User::find($id);
    $admin->delete();
    return redirect()->back();
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

  public function gradeStore(Request $request)
  {
    $data = $request->all();

    $duplicate_grade_check = Grade::get()->where('name', $data['grade'])->where('school_id', auth()->user()->school_id);

    if (count($duplicate_grade_check) == 0) {
      Grade::create([
        'name' => $data['grade'],
        'grade_point' => $data['grade_point'],
        'mark_from' => $data['mark_from'],
        'mark_upto' => $data['mark_upto'],
        'school_id' => auth()->user()->school_id,
      ]);

      return redirect()->back()->with(['error' => 'Sorry this grade already exists']);

    } else {
      return view('admin.grade.grade_list')->with(['message' => 'You have successfully create a new grade.']);
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

    return redirect()->back()->with('message', 'You have successfully update grade.');
  }

  public function gradeDelete($id)
  {
    $grade = Grade::find($id);
    $grade->delete();
    $grades = Grade::get()->where('school_id', auth()->user()->school_id);
    return redirect()->back()->with('message', 'You have successfully delete grade.');
  }

  //Exam

  public function examList()
  {
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $exams = Exam::get()->where('school_id', auth()->user()->school_id);
    return view('admin.examination.exam_list', ['exams' => $exams, 'classes' => $classes]);
  }

  public function createExam()
  {
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', auth()->user()->school_id);
    return view('admin.examination.add_exam', ['classes' => $classes, 'sections' => $sections]);
  }

  public function examStore(Request $request)
  {
    $data = $request->all();
    $exam = Exam::create([
      'name' => $data['exam_name'],
      'exam_type' => $data['exam_type'],
      'starting_time' => strtotime($data['starting_date'] . '' . $data['starting_time']),
      'ending_time' => strtotime($data['ending_date'] . '' . $data['ending_time']),
      'total_marks' => $data['total_marks'],
      'status' => 'pending',
      'class_id' => $data['class_id'],
      'section_id' => $data['section_id'],
      'school_id' => auth()->user()->school_id,
    ]);
    $exam->save();

    return redirect()->back()->with('message', 'You have successfully create a new exam.');
  }

  public function editExam(string $id)
  {
    $exam = Exam::find($id);
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', $exam->school_id);
    return view('admin.examination.edit_exam', ['exam' => $exam, 'classes' => $classes, 'sections' => $sections]);

  }

  public function examUpdate(Request $request, $id)
  {
    $data = $request->all();
    Exam::where('id', $id)->update([
      'name' => $data['exam_name'],
      'exam_type' => 'offline',
      'starting_time' => strtotime(date($data['starting_date']) . '' . $data['starting_time']),
      'ending_time' => strtotime(date($data['ending_date']) . '' . $data['ending_time']),
      'total_marks' => $data['total_marks'],
      'status' => 'pending',
      'class_id' => $data['class_id'],
      'section_id' => $data['section_id'],
      'school_id' => auth()->user()->school_id
    ]);
    return redirect()->back()->with('message', 'You have successfully update exam.');

  }

  public function examDelete($id)
  {
    $exam = Exam::find($id);
    $exam->delete();
    return redirect()->back()->with('message', 'You have successfully delete exam.');
  }

  public function classWiseExam($id)
  {
    $id = array('class_id');
    $exams = Exam::where([
      'class_id' => $id
    ])->first();
    $classes = Classes::where('school_id', auth()->user()->school_id)->get();
    return view('admin.examination.exam_list', ['exams' => $exams, 'classes' => $classes]);
  }

  //Marks

  public function marks()
  {
    $student_details = User::get()->where('role_id', 3);
    $marks = Mark::get();
    $classes = Classes::get()->where('school_id', auth()->user()->school_id);
    $sections = Section::get()->where('school_id', auth()->user()->school_id);

    return view('admin.marks.marks_list', ['student_details' => $student_details, 'classes' => $classes, 'sections' => $sections, 'marks' => $marks]);
  }

}