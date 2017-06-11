<?php

$prefix = \App\Modules\ModulesServiceProvider::setLocale('cpAdmin');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Newsletters\Controllers\cpAdmin', 'middleware' => 'employee'], function () {
	Route::resource('newsletters', 'NewslettersController');
	Route::get('newsletters/send-mail/{id}', ['as' => 'get-send-mail', 'uses' => 'NewslettersController@getMail']);
	Route::post('newsletters/send-mail/{id}', ['as' => 'post-send-mail', 'uses' => 'NewslettersController@postMail']);
});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('front');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Newsletters\Controllers\front', 'middleware' => 'auth'], function () {
    Route::resource('newsletters', 'NewslettersController');
});

$prefix = \App\Modules\ModulesServiceProvider::setLocale('');
Route::group(['prefix' => $prefix, 'namespace' => 'App\Modules\Newsletters\Controllers'], function () {
	Route::resource('newsletters', 'NewslettersController', ['except' => ['index', 'create', 'show', 'edit', 'update', 'destroy']]);
});