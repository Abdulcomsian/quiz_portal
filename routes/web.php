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

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/quiz_type', function () {
    return view('quiz_type');
});
Route::get('/interactive_quiz', function () {
    return view('quiz/interactive_quiz');
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
    Route::get('/quiz', [App\Http\Controllers\quizController::class, 'index'])->name('quiz');
    Route::post('/test', [App\Http\Controllers\quizController::class, 'store_quiz'])->name('test.store');
    Route::get('/q_result', [App\Http\Controllers\quizController::class, 'q_result']);
    Route::get('/q_review/{id}', [App\Http\Controllers\quizController::class, 'q_review'])->name('quiz.review');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

