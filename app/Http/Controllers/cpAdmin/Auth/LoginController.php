<?php

namespace App\Http\Controllers\cpAdmin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('employee');
    }

    public function showLoginForm()
    {
        return view('cpAdmin.auth.login');
    }
}
