<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabResults extends Model
{
    protected $table="lab_results";
    public $timestamps=false;
    protected $fillable=['lab_id', 'reg_date', 'expire_date', 'user_id', 'description', 'staff_id', 'status'];
}
