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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware(['auth','can:admin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\admin\dashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/user', 'App\Http\Controllers\admin\UserController');
    Route::resource('/quiz', 'App\Http\Controllers\admin\QuizController');
    Route::post('/user_status/{id}', [App\Http\Controllers\admin\UserController::class, 'update_status'])->name('user-status');
    Route::get('/quiz_result', [App\Http\Controllers\admin\UserController::class, 'quiz_result'])->name('admin.quiz_result');
});

/*****************ADMIN ROUTES*******************/
Route::prefix('user')->middleware(['auth','can:user'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\user\dashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'index'])->name('quiz');
    Route::post('/test', [App\Http\Controllers\QuizController::class, 'store_quiz'])->name('test.store');
    Route::get('/q_result', [App\Http\Controllers\QuizController::class, 'q_result']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

