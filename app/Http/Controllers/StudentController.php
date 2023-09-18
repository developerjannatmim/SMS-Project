<?php

namespace App\Http\Controllers;

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

    function profile()
    {
        return view('student.profile.view');
    }

    function profile_edit(Request $request)
    {
        return view('student.profile.update');
    }

    function profile_update()
    {
        //return view('student.profile.update');
    }
}
