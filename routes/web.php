<?php

use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->role == 'student'){
            return redirect("/student/".Auth::user()->id);
        }
        if(Auth::user()->role == 'admin'){
            return redirect("/admin");
        }
    }
    return view("Master.master");
});

Auth::routes();

Route::get('/enroll', function () {
    return view('Student.Enroll');
});

/**resource part */
Route::resource('admin', 'App\Http\Controllers\AdminCon')->middleware(CheckStatus::class);
Route::resource('student', 'App\Http\Controllers\StudentController');
Route::resource('course', 'App\Http\Controllers\CourseController');
Route::resource('registration', 'App\Http\Controllers\RegistrationController');

/**end */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(CheckStatus::class);

Route::get('/admin','App\Http\Controllers\AdminCon@index');
Route::get('/admin/delete/{id}', 'App\Http\Controllers\AdminCon@destroy')->name('admin.destroy');
Route::get('/grade', function () {
    $data = DB::table('users')->whereRaw('approve = 1 and id <> 1')->get();
    return view('admin.grade', compact(['data']));
});

Route::get('/updategrade', 'App\Http\Controllers\AdminCon@update');

Route::get('/student/{id}', 'App\Http\Controllers\StudentController@show');
Route::get('/enroll/{id}', 'App\Http\Controllers\CourseController@show');

Route::get('/registration/delete/{id}',"App\Http\Controllers\RegistrationController@destroy")->name('registration.destroy');
Route::post('/registration', "App\Http\Controllers\RegistrationController@store");

Route::get('/student/delete/{id}','App\Http\Controllers\StudentController@destroy')->name('student.destroy');
Route::post('/student', 'App\Http\Controllers\StudentController@store');
Route::post('/student/update/{id}','App\Http\Controllers\StudentController@update');

Route::get('/course/delete/{id}','App\Http\Controllers\CourseController@destroy');
Route::post('/course/update/{id}','App\Http\Controllers\CourseController@update');
Route::post('/course','App\Http\Controllers\CourseController@store');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
