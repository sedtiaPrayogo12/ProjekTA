<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;

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


Route::get('/', [DashboardController::class, 'index']);

Route::get('index', function () {
    return view('index');
})->name('index')->middleware('auth');

// Route::middleware(['auth:sanctum', 'verified'])->get('/index', function () {
//     return view('index');
// })->name('index');

// Route::get('course', [CourseController::class, 'index'])->name('course');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function () {
        Route::resource('lesson', \App\Http\Controllers\Students\LessonController::class);
    });
    Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function () {
        Route::resource('course', \App\Http\Controllers\Teacher\CourseController::class);
    });
});
