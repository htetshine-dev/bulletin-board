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

Route::get('/user-login', 'User\UserController@login');
//Route::post('/user-login', 'User\UserController@check');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix'=>'user','namespace'=>'user','middleware'=>'auth'), function(){
   //Users
   Route::group(array('prefix'=>'user','namespace'=>'user','middleware'=>'auth'), function(){
      Route::get('/user-lists', 'UserController@index');
      Route::get('/create-user', 'UserController@create');
      Route::post('/create-user', 'UserController@store'); 
      Route::get('/update-user/{id}', 'UserController@edit');
      Route::post('/update-user/{id}', 'UserController@update');
      Route::get('/profile/{id}', 'UserController@show');
      Route::get('/change-password/{id}', 'UserController@changePassword');
      Route::post('/change-password/{id}', 'UserController@saveNewPassword');
   });

   //Posts
   Route::group(array('prefix'=>'post','namespace'=>'post','middleware'=>'auth'), function(){
      Route::get('/post-lists', 'PostController@index');
      Route::get('/create-post', 'PostController@create');
      Route::post('/create-post', 'PostController@store');
      Route::get('/update-post/{id}', 'PostController@edit');
      Route::post('/update-post/{id}', 'PostController@update');
   });

   //Csv
   Route::group(array('prefix'=>'csv','namespace'=>'csv','middleware'=>'auth'), function(){
      Route::get('/upload-csv', 'CsvController@create');
      Route::post('/upload-csv', 'CsvController@store');
   });
   
});


