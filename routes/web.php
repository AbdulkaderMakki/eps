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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/test', 'authse@test');
Route::get('/new', 'Test@asd')->middleware('myauth');
Route::get('/auth', 'Test@authenticate')->middleware('myauth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=>['myauth']],function (){
    Route::get('/', 'Home@index')->name('home');
});
