<?php namespace App\Modules\Products\Models;

use App\BaseModel;

class Product extends BaseModel
{

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $hidden = ['remember_token'];
    protected $fillable = ['is_active', 'active_date', 'category_id', 'price', 'quantity', 'condition', 'image'
        , 'lat', 'lng', 'front_user', 'user_id', 'params', 'status', 'visits', 'likes'];
    public $rules = [
        'category_id' => 'required|numeric',
        'title' => 'required',
        'alias' => 'required|unique:products_lang,alias'
    ];
    public $rules_upd = [
        'category_id' => 'required|numeric',
        'title' => 'required'
    ];
    public $errors;

} 
