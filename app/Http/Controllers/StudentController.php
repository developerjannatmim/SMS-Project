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
}
