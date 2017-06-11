<?php namespace App\Modules\Newsletters\Models;

use App\BaseModel;

class Newsletters extends BaseModel {

    protected $table      = 'newsletters';
    protected $primaryKey = 'id';
    protected $hidden     = ['remember_token'];
    protected $fillable   = ['name', 'email', 'status'];
    public $rules         = [
        'name'  => 'required',
        'email' => 'required|email|unique:newsletters'
    ];
    public $messages    = [
        'name.required'     => 'لطفا فیلد نام را پر کنید',
        'email.required'    => 'لطفا فیلد ایمیل را پر کنید',
        'email.email'       => 'لطفا ایمیل خود را درست وارد کنید',
        'email.unique'      => 'ایمیل وارد شده قبلا ثبت شده'
    ];

    public function getNewsletters($data=null, $limit=20, $id=null){
        if(isset($data['filtering']) && $data['filtering']){
            $result = $this;
            if($data['name']){$result = $result->where('name', 'LIKE', '%'.$data['name'].'%');}
            if($data['email']){$result = $result->where('email', $data['email']);}
            $result = $result->paginate($limit);
        }else{
            $result = $this->paginate($limit);
        }

        if($id){$result = $this->find($id);}
        return $result;
    }

    public function getValidUserEmail($id){
        $result = $this->where('status', 1);
        if($id){
            $result = $result->where('id', $id);
        }
        return $result->lists('email', 'name')->all();
    }

} 
