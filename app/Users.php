<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table="users";
    public $timestamps=false;
    protected $fillable=['name', 'email', 'mobile', 'password', 'user_type_id', 'city_id'];
}
