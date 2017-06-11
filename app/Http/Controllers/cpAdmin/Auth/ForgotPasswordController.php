<?php

namespace App\Http\Controllers\cpAdmin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('cpAdmin.auth.passwords.email');
    }

    public function broker()
    {
        return Password::broker('employees');
    }

}
