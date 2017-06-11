<?php

namespace App\Http\Controllers\cpAdmin\Auth;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('cpAdmin.auth.register');
    }

    public function register(Request $request)
    {

        //Validates data
        $this->validator($request->all())->validate();

        //Create employee
        $employee = $this->create($request->all());

        //Authenticates employee
        $this->guard()->login($employee);

        //Redirects employee
        return redirect($this->redirectPath);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

}
