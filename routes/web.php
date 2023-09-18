<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');


});

Route::get('admin/student', [AdminController::class, 'student_list'])->name('admin.student');
Route::get('admin/student/create', [AdminController::class, 'student_create'])->name('admin.student.create');
Route::post('admin/student', [AdminController::class, 'student_store'])->name('admin.student.store');

//Admin routes start here
Route::controller(AdminController::class)->middleware(['admin','auth'])->group(function () {

    Route::get('admin/dashboard', 'adminDashboard')->name('admin.dashboard')->middleware('role_id');

    //Admin users route
    Route::get('admin/admin', 'adminList')->name('admin.admin');

    //Student users route
    // Route::get('admin/student', 'student_list')->name('admin.student');
    // Route::get('admin/student/create', 'student_create')->name('admin.student.create');
    // Route::post('admin/student', 'student_store')->name('admin.student.store');
    Route::get('admin/student/edit/{id}', 'student_edit')->name('admin.student.edit');
    Route::post('admin/student/{id}', 'student_update')->name('admin.student.update');
    Route::get('admin/student/delete/{id}', 'student_delete')->name('admin.student.delete');

    //Parent users route
    // Route::get('admin/parent', 'parent_list')->name('admin.parent');
    Route::post('admin/parent/create',  'parent_create')->name('admin.parent.create');
    Route::get('admin/parent',  'parent_store')->name('admin.parent.store');
    Route::get('admin/parent/edit/{id}', 'parent_edit')->name('admin.parent.edit');
    Route::post('admin/parent/{id}', 'parent_update')->name('admin.parent.update');
    Route::get('admin/parent/delete/{id}', 'parentDelete')->name('admin.parent.delete');

    //Teacher users route
    Route::get('admin/teacher', 'teacherList')->name('admin.teacher');

    //Routine routes
    Route::get('admin/routine', 'routine')->name('admin.routine');

    //Marks route
    Route::get('admin/marks', 'marks')->name('admin.marks');

    //Grade routes
    Route::get('admin/grade', 'grade_list')->name('admin.grade');

    //Subject routes
    Route::get('admin/subject', 'subjectList')->name('admin.subject');

    //Syllabus routes
    Route::get('admin/syllabus', 'list_of_syllabus')->name('admin.syllabus');

    //Depertment routes
    Route::get('admin/department', 'departmentList')->name('admin.department');

    //Class list routes
    Route::get('admin/class_list', 'classList')->name('admin.class_list');

});
//Admin routes end here

//Teacher routes are here
Route::controller(TeacherController::class)->middleware(['teacher','auth'])->group(function () {

    Route::get('teacher/dashboard', 'teacherDashboard')->name('teacher.dashboard')->middleware('role_id');


    //Marks routes
    Route::get('teacher/marks', 'marks')->name('teacher.marks');

    //Grade routes
    Route::get('teacher/grade', 'grade')->name('teacher.grade_list');

    //Routine routes
    Route::get('teacher/routine', 'routine')->name('teacher.routine');

    //Subject routes
    Route::get('teacher/subject', 'subjectList')->name('teacher.subject_list');


    //Syllabus routes
    Route::get('teacher/syllabus', 'list_of_syllabus')->name('teacher.syllabus_list');

    //Profile
    Route::get('teacher/profile', 'profile')->name('teacher.profile');
    Route::post('teacher/profile/update', 'profile_update')->name('teacher.profile.update');
    Route::any('teacher/password/{action_type}', 'password')->name('teacher.password');

});
//Teacher routes end here

//Parent routes are here
Route::controller(ParentController::class)->middleware(['parent','auth'])->group(function () {

    Route::get('parent/dashboard', 'parentDashboard')->name('parent.dashboard')->middleware('role_id');


    //User routes
    Route::get('parent/teacherlist', 'teacherList')->name('parent.teacherlist');
    Route::get('parent/childlist', 'childList')->name('parent.childlist');

    //Grade rotues
    Route::get('parent/grade', 'gradeList')->name('parent.grade_list');

    //Subject routes
    Route::get('parent/child/subjects', 'subjectList')->name('parent.subject_list');

    //Syllabus routes
    Route::get('parent/child/syllabus', 'syllabusList')->name('parent.syllabus_list');

    //Routine routes
    Route::get('parent/routine', 'routine')->name('parent.routine');

    //Marks routes
    Route::get('parent/marks', 'marks')->name('parent.marks');

    //Profile
    Route::get('parent/profile', 'profile')->name('parent.profile');
    Route::post('parent/profile/update', 'profile_update')->name('parent.profile.update');
    Route::any('parent/password/{action_type}', 'password')->name('parent.password');

});
//Parent routes end here

//Student routes are here
Route::controller(StudentController::class)->middleware(['student','auth'])->group(function () {

    Route::get('student/dashboard', 'studentDashboard')->name('student.dashboard')->middleware('role_id');

    //User routes
    Route::get('student/teacher', 'teacherList')->name('student.teacher');

    //Routine routes
    Route::get('student/routine', 'routine')->name('student.routine');

    //Subject routes
    Route::get('student/subject', 'subjectList')->name('student.subject_list');

    //Syllabus routes
    Route::get('student/syllabus', 'syllabus')->name('student.syllabus_list');

    //Grade routes
    Route::get('student/grade', 'gradeList')->name('student.grade_list');

    //Marks routes
    Route::get('student/marks', 'marks')->name('student.marks');

    //Profile
    Route::get('student/profile', 'profile')->name('student.profile');
    Route::get('student/profile/edit', 'profile_edit')->name('student.profile.edit');
    Route::post('student/profile/update', 'profile_update')->name('student.profile.update');
    Route::any('student/password/{action_type}', 'password')->name('student.password');
});
//Student routes end here
