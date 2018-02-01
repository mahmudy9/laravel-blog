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

Route::get('/about' , function(){
    return view('about');
});

Route::get('/myposts' , 'UsersController@index');

Route::get('/showprofile' , 'UsersController@show');

Route::get('/editprofile' , 'UsersController@edit');

Route::post('/updateprofile' , 'UsersController@update');

Route::get('/post/create' , 'UsersController@createPost');
Route::post('/post/store' , 'UsersController@storePost');
Route::get('/post/show/{id}/{slug}' , 'UsersController@showPost');
Route::get('categories' , 'CategoryController@index');
Route::get('categories/{category_name}' , 'CategoryController@postsByCategory');