<?php

use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('Student.Enroll');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(CheckStatus::class);
Route::resource('admin', 'App\Http\Controllers\AdminCon')->middleware(CheckStatus::class);
Route::get('/admin/delete/{id}', 'App\Http\Controllers\AdminCon@destroy')->name('admin.destroy');
Route::get('/grade', function () {
    $data = DB::table('users')->whereRaw('status = 1 and id <> 1')->get();
    return view('admin.grade', compact(['data']));
});
