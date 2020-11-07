<?php

use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('Student.student');
});

Auth::routes();

Route::get('/enroll', function () {
    return view('Student.Enroll');
});

/**resource part */
Route::resource('admin', 'App\Http\Controllers\AdminCon')->middleware(CheckStatus::class);
Route::resource('student','App\Http\Controllers\StudentController');
Route::resource('course','App\Http\Controllers\CourseController');
Route::resource('registration','App\Http\Controllers\RegistrationController');

/**end */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(CheckStatus::class);

Route::get('/admin/delete/{id}', 'App\Http\Controllers\AdminCon@destroy')->name('admin.destroy');
Route::get('/grade', function () {
    $data = DB::table('users')->whereRaw('approve = 1 and id <> 1')->get();
    return view('admin.grade', compact(['data']));
});
Route::get('/updategrade','App\Http\Controllers\AdminCon@update');

Route::get('/student/{id}','App\Http\Controllers\StudentController@show');
Route::get('/enroll/{id}','App\Http\Controllers\CourseController@show');

Route::post('/registration',"App\Http\Controllers\RegistrationController@store");
Route::post('/student','App\Http\Controllers\StudentController@store');
Route::post('/login','App\Http\Controllers\Auth\LoginController@login');
Route::get('/logout','App\Http\Controllers\Auth\LoginController@logout');