<?php
$prefix = \App\Modules\ModulesServiceProvider::setLocale('cpAdmin');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Products\Controllers\cpAdmin', 'middleware' => 'employee'], function () {
	Route::resource('product', 'ProductController');
});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('front');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Products\Controllers\front', 'middleware' => 'auth'], function () {
    Route::resource('product', 'ProductController');
});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Products\Controllers'], function () {

    Route::resource('product', 'ProductController');
});
