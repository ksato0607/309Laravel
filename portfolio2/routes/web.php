<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PageController@home');

//Route::get('image-upload','PageController@imageUpload');
Route::post('/','PageController@imageUploadPost');

Route::get('/test','PageController@databasePost');


Route::get('firebaseTest','PageController@test');
//Route::post('/','PageController@databasePost');
