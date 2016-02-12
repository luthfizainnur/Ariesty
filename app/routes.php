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

Route::get('login', array('uses' => 'IndexController@login'));
Route::post('login',array('uses' => 'IndexController@authenticate'));

Route::get('hasilforuser', 'IndexController@screenHasilUser');

Route::group(array('before' => 'auth'), function(){
    Route::get('admin', array('as' => 'admin.admin', 'uses' => 'IndexController@admin'));
    Route::get('admin/barang/{jenis_pastry}', 'IndexController@getProdukAdmin');
    Route::get('answer', 'IndexController@postjawabanadmin');
    
    Route::get('hasil', 'IndexController@screenHasil');
    Route::post('hasil', 'IndexController@groupJawaban');

    Route::get('register', 'IndexController@register');
    Route::post('register', 'IndexController@registerresult');

    Route::get('logout', array('as' => 'logout.logout', 'uses' => 'IndexController@logout'))->after('invalidate-browser-cache');
});

