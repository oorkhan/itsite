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

Route::get('/','pagesController@index');
Route::get('/contact','pagesController@contact');
Route::get('/about','pagesController@about');
Route::get('/tables','pagesController@tables');
Route::get('/charts','pagesController@charts');
Route::get('/departments','departmentsController@index');

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
