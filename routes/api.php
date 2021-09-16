<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\ExamsApiController;
use App\Http\Controllers\QuizApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/profile', [AuthApiController::class, 'index']);

    Route::get('/related/quizzes',[QuizApiController::class, 'related']);
    Route::get('/quizzes',[QuizApiController::class, 'index']);

    Route::get('/exams',[ExamsApiController::class, 'index']);
    Route::get('/exams/{exam}',[ExamsApiController::class, 'view']);

});
