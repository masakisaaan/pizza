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

Route::get('/', 'IndexController@index');

Route::get('/menu','MenusController@index');



Route::get('/menuadd',function(){
    return view('/menuadd/index');
});



Route::get('/company', 'PagesController@company');
Route::get('/privacypolicy', 'PagesController@privacypolicy');
Route::get('/agreement', 'PagesController@agreement');
Route::get('/faq', 'PagesController@faq');

Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@post');


Route::get('/test','TestsController@index');

