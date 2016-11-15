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

// トップページ
Route::get('/', 'IndexController@index');

// メニューページ
Route::get('/menu','MenusController@index');

// カートページ
Route::get('/cart','CartsController@index')->name('cart');
Route::post('/cart/store','CartsController@store');
Route::post('/cart/clear','CartsController@clear');

// etc..
Route::get('/company', 'PagesController@company');
Route::get('/privacypolicy', 'PagesController@privacypolicy');
Route::get('/agreement', 'PagesController@agreement');
Route::get('/faq', 'PagesController@faq');


// コンタクト
Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@post');


// API
Route::get('/app/countCartContents','ApisController@countCartContents');



// --------------------------- 管理者用 ---------------------------------------


//管理者用ページ
Route::get('/employee/list', 'EmployeesController@employeeList'); //従業員一覧
Route::get('/employee/edit', 'EmployeesController@employeeEdit'); //従業員編集
Route::get('/employee/add', 'EmployeesController@employeeAdd'); //従業員追加

Route::get('/pizzzzza/menu/list', 'AdminMenusController@AdminMenuList'); //従業員用メニュー一覧
Route::get('/pizzzzza/menu/edit', 'AdminMenusController@AdminMenuEdit'); //従業員用メニュー編集
Route::get('/pizzzzza/menu/add', 'AdminMenusController@AdminMenuAdd'); //従業員用メニュー追加





//テスト
Route::get('/test','TestsController@index');
