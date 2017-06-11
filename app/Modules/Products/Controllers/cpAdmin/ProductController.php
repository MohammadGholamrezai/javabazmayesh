<?php namespace App\Modules\Products\Controllers\cpAdmin;


use App\Http\Controllers\cpAdmin\cpAdminController;
use Illuminate\Support\Facades\Config;
use App\Modules\Products\Models\Product;

class ProductController extends cpAdminController {

    public $locale;
    public $product;
    public $feature;
    public $listLang;
    public $langActive;

    public function __construct(Product $product){
        $this->product              = $product;
        $this->listLang             = Config::get('app.locales');
        $this->langActive           = app('getLocale');
        $this->locale               = app('locale') == '' ? '' : app('locale') . '.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Resource
     */
    public function index(){

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Resource
     */
    public function create(){

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Resource
     */
    public function store(){

    }


    /**
     * Display the specified resource.
     *
     * @param  int $product_id
     * @return Resource
     */
    public function show($product_id){
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $product_id
     * @return Resource
     */
    public function edit($product_id){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $product_id
     * @return Resource
     */
    public function update($product_id){

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $product_id
     * @return Resource
     */
    public function destroy($product_id){

    }

}
