<?php namespace App\Modules\Newsletters\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Newsletters\Models\Newsletters;

class NewslettersController extends Controller{

    protected $newsletters;

    public function __construct(Newsletters $newsletters){
        $this->newsletters = $newsletters;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Resource
     */
    public function index(){
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Resource
     */
    public function create(){
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return array
     */
    public function store(){
        $input           = Input::all();
        $input['status'] = 1;
        $valid           = true;
        if(!$this->newsletters->fill($input)->isValid()){
            $bugs   = [];
            $valid  = false;
            $errors = (array)$this->newsletters->errors;
            foreach((object)$errors as $error){
                if(is_array($error)){
                    foreach($error as $key => $value){
                        $bugs[$key] = $value[0];
                    }
                }
            }

            return ['action'=>false,'msg'=>"خطا در اطلاعات",'color'=>'orange','err'=>$this->newsletters->errors];
        }

        if($this->newsletters->save()){
            return ['action'=>true,'msg'=>"با تشکر، اطلاعات شما با موفقیت ثبت گردید.",'color'=>'green','err'=>null];
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Resource
     */
    public function show($id){
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Resource
     */
    public function edit($id){
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Resource
     */
    public function update($id){
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Resource
     */
    public function destroy($id){
        //
    }

}
