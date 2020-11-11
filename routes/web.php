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
    Route::get('profile', 'UserController@show')->name('user.profile');
    Route::post('store_user', 'UserController@store')->name('user.store');
    Route::post('update_user/{id}', 'UserController@update')->name('user.update');
    Route::post('update_pass/{id}', 'UserController@pass')->name('user.pass');
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
    Route::get('course_list/{id}', 'CourseController@list')->name('course.student.list');
    Route::get('course_lt_list', 'CourseController@levelterm')->name('course.levelterm');
    Route::get('course_edit', 'CourseController@edit')->name('course.edit');
    Route::post('store_course', 'CourseController@store')->name('course.store');
    Route::get('show_course/{id}', 'CourseController@show')->name('course.show');
    Route::post('update_course/{id}', 'CourseController@update')->name('course.update');
    Route::get('delete_course/{id}', 'CourseController@destroy')->name('course.delete');
    Route::get('course/register/{course_id}', 'CourseController@register')->name('course.register');

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
    Route::get('my_details_result/{id}', 'ResultController@my_details_result')->name('result.my_details_result');


    // ===== Notice ======
    Route::get('notice_list', 'NoticeController@index')->name('notice.index');


    // ========Account=====
    Route::get('account_list', 'AccountController@index')->name('account.index');
    Route::get('my_account', 'AccountController@myDue')->name('account.my.due');
    Route::get('account_edit', 'AccountController@edit')->name('account.edit');
    Route::post('store_account', 'AccountController@store')->name('account.store');
    Route::get('show_account/{id}', 'AccountController@show')->name('account.show');
    Route::post('update_account/{id}', 'AccountController@update')->name('account.update');
    Route::get('delete_account/{id}', 'AccountController@destroy')->name('account.delete');
    Route::get('search_dueType/{type}', 'AccountController@search_dueType')->name('account.search.type');
    Route::get('search_student/{id}', 'AccountController@search_student')->name('account.search.student');
    Route::get('search_semester/{id}', 'AccountController@search_semester')->name('account.search.semester');

    // ======Due Type=====

    Route::get('due_type_list', 'DuetypeController@index')->name('due.index');
    Route::post('due_type_store', 'DuetypeController@store')->name('due.store');
    Route::post('update_type/{id}', 'DuetypeController@update')->name('due.update');
    Route::get('due_type_delete/{id}', 'DuetypeController@destroy')->name('due.delete');



    // ========Attendance=====
    Route::get('attendance_list', 'AttendanceController@index')->name('attendance.courses');
    Route::get('attendance_student_list/{id}', 'AttendanceController@student_list')->name('attendance.student.list');
    Route::get('attendance_list/{id}', 'AttendanceController@attendance_list')->name('attendance.list');
    Route::get('attendance_details/{id}/{course_id}', 'AttendanceController@attendance_details')->name('attendance.details');
    Route::post('store_attendance', 'AttendanceController@store')->name('attendance.store');
    Route::post('update_attendance/{id}', 'AttendanceController@update')->name('attendance.update');
    Route::get('delete_attendance/{id}/{email}', 'AttendanceController@destroy')->name('attendance.delete');
    Route::get('change_status', 'AttendanceController@change_status')->name('attendance.change_status');


    //==== Import ====
    Route::get('importExportView', 'ImportController@importExportView')->name('import.view');
    Route::get('export', 'FacultyController@export')->name('export');
    Route::post('import', 'FacultyController@import')->name('import');
    Route::post('student_import', 'StudentController@import')->name('student.import');
    Route::post('course_import', 'CourseController@import')->name('course.import');
    Route::post('result_import', 'ResultController@import')->name('result.import');
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
