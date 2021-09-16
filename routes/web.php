<?php

use Illuminate\Support\Facades\Auth;
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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {

        Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categoreis');
        Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categoreis.create');
        Route::post('/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categoreis.store');

        Route::get('/skills', [App\Http\Controllers\SkillsController::class, 'index'])->name('skills');
        Route::get('/skills/create', [App\Http\Controllers\SkillsController::class, 'create'])->name('skills.create');
        Route::post('/skills', [App\Http\Controllers\SkillsController::class, 'store'])->name('skills.store');

        Route::get('/students', [App\Http\Controllers\StudentsController::class, 'index'])->name('students');
        Route::get('/students/create', [App\Http\Controllers\StudentsController::class, 'create'])->name('students.create');
        Route::post('/students', [App\Http\Controllers\StudentsController::class, 'store'])->name('students.store');

        Route::get('/quizzes', [App\Http\Controllers\QuizzesController::class, 'index'])->name('quizzes');
        Route::get('/quizzes/create', [App\Http\Controllers\QuizzesController::class, 'create'])->name('quizzes.create');
        Route::post('/quizzes', [App\Http\Controllers\QuizzesController::class, 'store'])->name('quizzes.store');
        Route::get('/quizzes/{quiz}', [App\Http\Controllers\QuizzesController::class, 'view']);

        Route::get('/quizzes/{quiz}/questions/create', [App\Http\Controllers\QuestionController::class, 'create']);
        Route::post('/quizzes/{quiz}/questions', [App\Http\Controllers\QuestionController::class, 'store']);
    });
});
