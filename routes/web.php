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

Route::group(['middleware' => ['auth','user_is_admin']], function () {

    //Categories
    Route::get('categories','CategoryController@index')->name('categories');

    //Products
    Route::get('products','ProductController@index')->name('products');

    //Tags
    Route::get('tags','TagController@index')->name('tags');

    //Reviews
    Route::get('reviews','ReviewController@index')->name('reviews');

    //Teckits
    Route::get('tickets','TicketController@index')->name('tickets');

    //Roles
    Route::get('roles','RoleController@index')->name('roles');

    //Units
    Route::get('units','UnitController@index')->name('units');
    Route::post('units','UnitController@store');
    Route::delete('units/{id}','UnitController@destroy')->name('units.delete');
    Route::get('units/{id}', 'UnitController@edit')->name('units.edit');
    Route::post('units/{id}', 'UnitController@update')->name('units.update');


    
});


