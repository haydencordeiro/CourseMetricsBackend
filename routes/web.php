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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
// Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// Students
Route::get('/student', [App\Http\Controllers\StudentHomeController::class, 'home'])->middleware('auth')->name('studentHome');
Route::get('/studentAttendance', [App\Http\Controllers\StudentHomeController::class, 'StudentAttendance'])->middleware('auth')->name('studentAttendance');

//Teachers
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'home'])->middleware('auth')->name('teacherHome');
Route::get('/attendanceForm', [App\Http\Controllers\TeacherController::class, 'attendanceForm'])->middleware('auth')->name('attendanceForm');