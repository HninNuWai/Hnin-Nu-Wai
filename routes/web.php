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

//Grade

Route::resource('/grade','GradeController');

Route::get('grade/{id}/edit', 'GradeController@edit');
Route::post('grade/{id}/update', 'GradeController@update');

//Section

Route::resource('/section','SectionController');

Route::get('/section-data','SectionController@data')->name('section.data');

// Route::get('section/{id}/edit', 'SectionController@edit');
// Route::post('section/{id}/update', 'SectionController@update');

//Student

Route::resource('student','StudentController');

Route::get('/student-data','StudentController@data')->name('student.data');

Route::get('/grades/{my}', 'StudentController@getGrade');

Route::get('/stu-sections/{my}', 'StudentController@getSection');
