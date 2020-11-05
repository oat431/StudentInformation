<?php
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::resource('admin','App\Http\Controllers\AdminCon')->middleware(CheckStatus::class);
Route::resource('student','App\Http\Controllers\StudentController');
Route::resource('course','App\Http\Controllers\CourseController');
Route::resource('registration','App\Http\Controllers\RegistrationController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(CheckStatus::class);
Route::get('/admin/delete/{id}', 'App\Http\Controllers\AdminCon@destroy')->name('admin.destroy');
Route::get('/grade',function(){
    $data = DB::table('students')->whereRaw('status = 1 and student_id <> 1')->get();
    return view('admin.grade',compact(['data']));
});
