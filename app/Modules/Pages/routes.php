<?php
$prefix = \App\Modules\ModulesServiceProvider::setLocale('cpAdmin');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Pages\Controllers\cpAdmin', 'middleware' => 'employee'], function () {

});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('front');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Pages\Controllers\front', 'middleware' => 'auth'], function () {

});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Pages\Controllers'], function () {

    Route::get('page/{page}.html', array('as' => 'showPage', 'uses' => 'PageController@show'));
    Route::resource('page', 'PageController', ['only' => ['show']]);

});
