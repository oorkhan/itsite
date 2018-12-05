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

/*
    get /departments (index)
    get /departments/create (create)
    get /departments/1 (show)
    post /departments (store)
    patch /departments/1/edit (update)
    delete /departments/1 (destroy)
*/
Route::resource('departments', 'departmentsController');
Route::resource('employees', 'employeesController');
Route::resource('tasks', 'TaskController');
Route::patch('completetask/{task}', 'TaskController@completeTask');
Route::resource('projects', 'ProjectController');
Route::resource('rooms', 'RoomController');
Route::get('/','pagesController@index');
Route::get('/contact','pagesController@contact');
Route::get('/about','pagesController@about');
Route::get('/tables','pagesController@tables');
Route::get('/charts','pagesController@charts');
// Route::get('/departments','departmentsController@index');
// Route::post('/departments','departmentsController@store');
// Route::get('/departments/create','departmentsController@create');

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
