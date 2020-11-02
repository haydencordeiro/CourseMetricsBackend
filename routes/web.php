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

// Route::get('/home', function () {
//     return view('add_teacher');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
// Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// Students
Route::get('/student', [App\Http\Controllers\StudentHomeController::class, 'home'])->middleware('auth')->name('studentHome');
Route::get('/studentAttendance', [App\Http\Controllers\StudentHomeController::class, 'StudentAttendance'])->middleware('auth')->name('studentAttendance');

//Teachers
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'home'])->middleware('auth')->name('teacherHome');
Route::post('/teacher', [App\Http\Controllers\TeacherController::class, 'home'])->middleware('auth')->name('teacherHome');
Route::get('/attendanceForm', [App\Http\Controllers\TeacherController::class, 'attendanceForm'])->middleware('auth')->name('attendanceForm');
Route::post('/attendanceForm', [App\Http\Controllers\TeacherController::class, 'attendanceFormPost'])->middleware('auth')->name('attendanceFormPost');
Route::get('/marksForm', [App\Http\Controllers\TeacherController::class, 'MarksForm'])->middleware('auth')->name('MarksForm');
Route::post('/marksForm', [App\Http\Controllers\TeacherController::class, 'marksFormPost'])->middleware('auth')->name('marksFormPost');
// admin
Route::get('/admin', [App\Http\Controllers\adminController::class, 'adminHome'])->middleware('auth')->name('adminHome');
Route::post('/admin', [App\Http\Controllers\adminController::class, 'adminHome'])->middleware('auth')->name('adminHome');
Route::get('/adminAddTeacher', [App\Http\Controllers\adminController::class, 'AddTeacher'])->middleware('auth')->name('AddTeacher');
Route::post('/adminAddTeacher', [App\Http\Controllers\adminController::class, 'AddTeacher'])->middleware('auth')->name('AddTeacher');

//Custom Regiser
Route::get('/register', [App\Http\Controllers\CustomRegister::class, 'CustomRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\CustomRegister::class, 'CustomRegister'])->name('register');

//Student Chapter
Route::get('/studentChapter', [App\Http\Controllers\StudentChapter::class, 'studentChapterHome'])->middleware('auth')->name('studentChapterHome');
Route::post('/studentChapter', [App\Http\Controllers\StudentChapter::class, 'studentChapterHome'])->middleware('auth')->name('studentChapterHome');


//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Home');


