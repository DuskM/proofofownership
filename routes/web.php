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

Route::get('/domain', 'UserDomainController@index');
Route::post('/domain/create', 'UserDomainController@store');
<<<<<<< Updated upstream
Route::resource('/domain', 'UserDomainController');
Route::get('domain/{{$domain->id}}/verify', 'UserDomainController@verify');
=======
Route::post('/domain/{id}/edit', 'UserDomainController@edit');
Route::resource('/domain', 'UserDomainController');
>>>>>>> Stashed changes
