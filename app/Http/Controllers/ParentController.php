<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function parentDashboard()
    {
        return view('parent.dashboard');
    }
}
