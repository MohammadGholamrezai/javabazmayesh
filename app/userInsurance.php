<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userInsurance extends Model
{
    protected $table="user_insurances";
    public $timestamps=false;
    protected $fillable=['user_id', 'insurance_id', 'type', 'status'];
}
