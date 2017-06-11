<?php

/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 13/01/2015
 * Time: 09:03 AM
 */
namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class UserAccessGroup extends BaseModel
{

    protected $table = 'user_access_group';
    protected $primaryKey = 'id';
    protected $fillable = ['access_group_id', 'user_id', 'employee_id', 'status'];

    protected $hidden = ['remember_token'];
    public $errors;
    public $rules = [
        'access_group_id' => 'required'
    ];

} 