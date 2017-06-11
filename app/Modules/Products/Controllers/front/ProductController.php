<?php namespace App\Modules\Products\Controllers\front;

use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Config;
use App\Modules\Products\Models\Product;

class ProductController extends FrontController
{

    public $locale;
    public $product;
    public $listLang;
    public $langActive;


    public function __construct(Product $product)
    {

        $this->product = $product;
        $this->listLang = Config::get('app.locales');
        $this->langActive = app('getLocale');
        $this->locale = app('locale') == '' ? '' : app('locale') . '.';

    }

    /**
     * Display a listing of the resource.
     *
     * @return Resource
     */
    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Resource
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Resource
     */
    public function store()
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Resource
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Resource
     */
    public function edit($id)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Resource
     */
    public function update($id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Resource
     */
    public function destroy($id)
    {

    }
}
