<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chartas', 'ChartaController@list')->name('chartas');
Route::get('/charta/{charta}', 'ChartaController@get');
Route::group(["middleware" => "auth"], function() {
    Route::any('/chartas/create', 'ChartaController@create');
    Route::get('/charta/{charta}/sign', 'ChartaController@sign');
    Route::get('/charta/{charta}/report', 'ChartaController@report');
    Route::any("/admin", 'HomeController@admin');
    Route::any("/admin/export", 'HomeController@export');
    Route::any("/admin/import", 'HomeController@import');
});
//Route::get('/chartas',)

//Route::get("/")
