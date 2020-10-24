<?php

use Illuminate\Support\Facades\Route;

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


//Clear configurations:
Route::get('/config-clear', function() {
	$status = Artisan::call('config:clear');
	return '<h1>Configurations cleared</h1>';
});

//Clear cache:
Route::get('/cache-clear', function() {
	$status = Artisan::call('cache:clear');
	return '<h1>Cache cleared</h1>';
});

//Clear cache:
Route::get('/key-gen', function() {
	$status = Artisan::call('key:generate');
	return '<h1>Cache cleared</h1>';
});

//view cache:
Route::get('/view-clear', function() {
	$status = Artisan::call('view:clear');
	return '<h1>Cache cleared</h1>';
});


//Clear configuration cache:
Route::get('/config-cache', function() {
	$status = Artisan::call('config:cache');
	return '<h1>Configurations cache cleared</h1>';
});

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

Auth::routes(['reset' => false, 'register' => false]);


Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');

    // ========User=====
    Route::get('user_list', 'UserController@index')->name('user.list');
    Route::post('store_user', 'UserController@store')->name('user.store');
    Route::post('update_user/{id}', 'UserController@update')->name('user.update');
    Route::get('delete_user/{id}', 'UserController@destroy')->name('user.delete');

    // ========Semester=====
    Route::get('semester_list', 'SemesterController@index')->name('semester.list');
    Route::post('store_semester', 'SemesterController@store')->name('semester.store');
    Route::post('update_semester/{id}', 'SemesterController@update')->name('semester.update');
    Route::get('delete_semester/{id}', 'SemesterController@destroy')->name('semester.delete');


    // ========Faculty=====
    Route::get('faculty_list', 'FacultyController@index')->name('faculty.list');
    Route::post('store_faculty', 'FacultyController@store')->name('faculty.store');
    Route::post('update_faculty/{id}', 'FacultyController@update')->name('faculty.update');
    Route::get('delete_faculty/{id}/{email}', 'FacultyController@destroy')->name('faculty.delete');


    // ========Student=====
    Route::get('student_list', 'StudentController@index')->name('student.list');
    Route::get('student_batch/{id}/{semester_id}', 'StudentController@batch_student')->name('student.batch_student');
    Route::get('student_batch/{id}', 'StudentController@batch')->name('student.batch');
    Route::post('store_student', 'StudentController@store')->name('student.store');
    Route::post('update_student/{id}', 'StudentController@update')->name('student.update');
    Route::get('delete_student/{id}/{email}', 'StudentController@destroy')->name('student.delete');

    Route::get('student_profile', 'StudentController@profile')->name('student.profile');


    // ========Course=====
    Route::get('course_list', 'CourseController@index')->name('course.list');
    Route::get('course_edit', 'CourseController@edit')->name('course.edit');
    Route::post('store_course', 'CourseController@store')->name('course.store');
    Route::get('show_course/{id}', 'CourseController@show')->name('course.show');
    Route::post('update_course/{id}', 'CourseController@update')->name('course.update');
    Route::get('delete_course/{id}', 'CourseController@destroy')->name('course.delete');

    // ========Result=====
    Route::get('result_list', 'ResultController@index')->name('result.list');
    Route::get('ct_result', 'ResultController@ct_result')->name('result.ct_result');
    Route::get('student_result/{id}/{semester_id}', 'ResultController@student_result')->name('result.student_result');
    Route::get('result_view/{id}', 'ResultController@view')->name('result.view');
    Route::get('result_edit/{id}', 'ResultController@edit')->name('result.edit');
    Route::post('store_result', 'ResultController@store')->name('result.store');
    Route::post('store_ct_result', 'ResultController@ct_store')->name('result.ct_store');
    Route::get('show_result/{id}', 'ResultController@show')->name('result.show');
    Route::post('update_result/{id}', 'ResultController@update')->name('result.update');
    Route::get('delete_result/{id}', 'ResultController@destroy')->name('result.delete');
    Route::get('result', 'ResultController@myResult')->name('result.myResult');


    // ===== Notice ======
    Route::get('notice_list', 'NoticeController@index')->name('notice.index');
});


Route::group(['middleware' => 'role:admin'], function(){
	Route::get('allAdmin/{id}', 'Admin\AdminController@index')->name('allAdmin');
	Route::get('adminLog/{id}', 'Admin\AdminController@index')->name('adminLog');

});
// Route::group(['middleware' => 'role:admin'], function(){
// 	Route::get('/home', 'HomeController@index')->name('home');
// });


// Route::group(['middleware' => 'role'], function(){
// 	Route::get('/home', 'HomeController@index')->name('home');
// });

// Route::group(['middleware' => 'role'], function(){
// 	Route::get('/home', 'HomeController@index')->name('home');
// });
