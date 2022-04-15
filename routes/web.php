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

   


Auth::routes();

/*****************ADMIN ROUTES*******************/
Route::prefix('admin')->middleware(['auth','can:admin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\admin\dashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/user', 'App\Http\Controllers\admin\UserController');
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/course', 'App\Http\Controllers\admin\CourseController');
    Route::resource('/course-category', 'App\Http\Controllers\admin\CourseCategoryController');
    Route::resource('/course-lesson', 'App\Http\Controllers\admin\LessonController');
    Route::resource('/quiz', 'App\Http\Controllers\admin\QuizController');
    Route::post('/user_status/{id}', [App\Http\Controllers\admin\UserController::class, 'update_status'])->name('user-status');
    Route::get('/quiz_result', [App\Http\Controllers\admin\UserController::class, 'quiz_result'])->name('admin.quiz_result');

    Route::get('get_category/{id}', [App\Http\Controllers\quizController::class, 'get_category']);
});

/*****************ADMIN ROUTES*******************/
Route::prefix('user')->middleware(['auth','can:user'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\user\dashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/select-number-of-question/{cat_id}', [App\Http\Controllers\quizController::class, 'question_select'])->name('select-number-of-question');
    Route::get('/select-category', [App\Http\Controllers\quizController::class, 'category_select'])->name('select-category');
    Route::post('/store_number', [App\Http\Controllers\quizController::class, 'index'])->name('user.store_number');
    Route::get('/quiz', [App\Http\Controllers\quizController::class, 'index'])->name('quiz');
    Route::post('/test', [App\Http\Controllers\quizController::class, 'store_quiz'])->name('test.store');
    Route::get('/q_result', [App\Http\Controllers\quizController::class, 'q_result']);
    Route::get('/q_review/{id}', [App\Http\Controllers\quizController::class, 'q_review'])->name('quiz.review');
    Route::get('/quiz_type', function () { return view('quiz_type'); });
    Route::get('/over_view', [App\Http\Controllers\quizController::class, 'over_view']);
    Route::get('/wc', [App\Http\Controllers\quizController::class, 'wc']);
    Route::get('/course', [App\Http\Controllers\quizController::class, 'course']);
    Route::get('/course-category/{id}', [App\Http\Controllers\quizController::class, 'course_category']);
    Route::get('/remain-commands', [App\Http\Controllers\quizController::class, 'remain_command']);
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

