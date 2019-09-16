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

use App\Http\Controllers\PeopleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'PeopleController@index')->name('index');

Route::get('/create', 'PeopleController@create')->name('create');
Route::post('/create', 'PeopleController@store')->name('store');
Route::get('/edit/{id}', 'PeopleController@edit')->name('edit');
Route::post('/update/{id}', 'PeopleController@update')->name('update');
Route::get('/delete/{id}', 'PeopleController@destroy')->name('delete');
//Route::Resource('/', 'PeopleController');
