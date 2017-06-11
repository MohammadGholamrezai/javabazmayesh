<?php

namespace App;

use App\Notifications\EmployeeResetPasswordNotification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'gender'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPasswordNotification($token));
    }
}
