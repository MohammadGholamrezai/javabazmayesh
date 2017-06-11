<?php namespace App\Modules\Products\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Modules\Products\Models\Product;

class ProductController extends Controller
{

    public $locale;
    public $listLang;
    public $langActive;
    public $comment;
    public $user_id;
    public $products;


    protected $user;

    public function __construct(Product $products, User $user)
    {
        $this->products = $products;
        $this->listLang = Config::get('app.locales');
        $this->langActive = app('getLocale');
        $this->locale = app('locale') == '' ? '' : app('locale') . '.';
        $this->user = $user;
        $this->user_id = isset(Auth::guard('user')->user()->id) ? Auth::guard('user')->user()->id : 0;
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
     * Display the specified resource.
     *
     * @param $id
     * @return Resource
     * @internal param int $id
     */
    public function show($id)
    {

    }

}
