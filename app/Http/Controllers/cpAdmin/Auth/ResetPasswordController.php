<?php

namespace App\Http\Controllers\cpAdmin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;
//Auth Facade
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    protected $redirectTo = '/cpAdmin/home';

    //trait for handling reset Password
    use ResetsPasswords;

    public function showResetForm(Request $request, $token = null)
    {
        return view('cpAdmin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('employees');
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

}
