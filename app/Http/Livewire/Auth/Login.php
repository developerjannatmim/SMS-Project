<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{

    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    //This mounts the default credentials for the admin. Remove this section if you want to make it public.
    // public function mount()
    // {
    //     if (auth()->user()) {
    //         return redirect()->intended('/dashboard');
    //     }
    //     $this->fill([
    //         'email' => 'admin@volt.com',
    //         'password' => 'secret',
    //     ]);
    // }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {

            if (auth()->user()->role_id == 1) {

                session(['admin_login' => 1]);
                return redirect()->route('admin.dashboard');

            } else if (auth()->user()->role_id == 2) {

                session(['teacher_login' => 2]);
                return redirect()->route('teacher.dashboard');

            } elseif ((auth()->user()->role_id == 3)) {

                session(['student_login' => 3]);
                return redirect()->route('student.dashboard');

            } elseif ((auth()->user()->role_id == 4)) {

                session(['parent_login' => 4]);
                return redirect()->route('parent.dashboard');

            } else {
                return $this->addError('email', trans('auth.failed'));
            }
        }else {
            return redirect()->route('login')
            ->with('error', 'Your school is yet to be authorized to this service!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
