<?php
ini_set('xdebug.max_nesting_level', 500);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

$prefix = \App\Modules\ModulesServiceProvider::setLocale('front');
Route::group(['prefix' => $prefix, 'namespace' => 'front', 'middleware' => 'auth'], function () {

});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('cpAdmin');
Route::group(['prefix' => $prefix,'middleware' => 'employee_guest'], function() {

    Route::get('/register', 'cpAdmin\Auth\RegisterController@showRegistrationForm');
    Route::post('/register', 'cpAdmin\Auth\RegisterController@register');
    Route::get('/login', 'cpAdmin\Auth\LoginController@showLoginForm');
    Route::post('/login', 'cpAdmin\Auth\LoginController@login');

    //Password reset routes
    Route::get('/password/reset', 'cpAdmin\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('/password/email', 'cpAdmin\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('/password/reset/{token}', 'cpAdmin\Auth\ResetPasswordController@showResetForm');
    Route::post('/password/reset', 'cpAdmin\Auth\ResetPasswordController@reset');


});

//Only logged in employees can access or send requests to these pages
Route::group(['prefix' => $prefix, 'namespace' => 'cpAdmin','middleware' => 'employee'], function(){

    Route::post('/logout', 'cpAdmin\Auth\LoginController@logout');
    Route::get('/home', function(){
        return view('cpAdmin.home');
    });
});

Route::get('lab/create','labController@create');
Route::post('lab/store', 'labController@store');
