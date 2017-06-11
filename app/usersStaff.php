<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersStaff extends Model
{
    protected $table="users_staff";
    public $timestamps=false;
    protected $fillable=['employer', 'user_id', 'expire_date', 'params', 'status'];
}
