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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('customer')->group(function (){
    Route::get('/index', 'CustomerController@index')->name('customers.index');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/create', 'CustomerController@store')->name('customers.store');
    Route::get('/{id}/update', 'CustomerController@edit')->name("customers.edit");
    Route::post('/{id}/update',"CustomerController@update")->name('customers.update');
    Route::get('/{id}/destroy', "CustomerController@destroy")->name('customers.destroy');
    Route::get('/filter','CustomerController@filterByCity')->name('customers.filterByCity');
    Route::get('/search','CustomerController@search')->name('customers.search');

});

Route::prefix('city')->group(function (){
    Route::get('/index', 'CityController@index')->name('city.index');
    Route::get('/create', 'CityController@create')->name('city.create');
    Route::post('/create', 'CityController@store')->name('city.store');
    Route::get('/{id}/update', 'CityController@edit')->name("city.edit");
    Route::post('/{id}/update',"CityController@update")->name('city.update');
    Route::get('/{id}/destroy', "CityController@destroy")->name('city.destroy');
});