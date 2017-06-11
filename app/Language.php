<?php

/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 13/01/2015
 * Time: 09:03 AM
 */
namespace App;

use Illuminate\Support\Facades\DB;

class Language extends BaseModel
{

    protected $table = 'languages';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'iso_code', 'language_code', 'date_format', 'date_format_full', 'active', 'is_rtl', 'status'];

    protected $hidden = ['remember_token'];
    public $errors;
    public $rules = [
        'name' => 'required'
        , 'iso_code' => 'required'
        , 'language_code' => 'required'
        , 'date_format' => 'required'
        , 'date_format_full' => 'required'
        , 'active' => 'required'
        , 'is_rtl' => 'required'];


    public function getLanguage($lang = 'fr')
    {

        $langDB = DB::table($this->table)->where('iso_code', '=', $lang)->select(['id', 'is_rtl'])->first();

        if (!$langDB)
            return false;

        return ['lang' => $lang, 'lang_id' => $langDB->id, 'is_rtl' => $langDB->is_rtl];

    }

} 
