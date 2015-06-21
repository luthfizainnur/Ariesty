<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');
Route::get('produk/{jenis_pastry}', 'IndexController@getProduk');
Route::get('jawaban', 'IndexController@postjawaban');

Route::get('login', 'IndexController@login');
Route::post('login','IndexController@authenticate');

Route::get('register', 'IndexController@register');
Route::post('register', 'IndexController@registerresult');

Route::post('register', 'IndexController@postjawaban');

Route::get('hasil', 'IndexController@groupJawaban');

Route::get('admin', array('as' => 'admin.admin', 'uses' => 'IndexController@admin'));

Route::group(array('before' => 'auth'), function(){
    Route::get('admin', array('as' => 'admin.admin', 'uses' => 'IndexController@admin'));
    
    Route::get('logout', array('as' => 'logout.logout', 'uses' => 'IndexController@logout'));
});

