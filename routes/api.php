<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;

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
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/', [TaskController::class, 'store']);
    Route::delete('/{task}', [TaskController::class, 'destroy']);
    Route::patch('/{task}/update-status', [TaskController::class, 'updateStatus']);
});


Route::post('/register', [UserController::class, 'register']);
Route::get('/users/{id}', [UserController::class, 'getUserById']);
Route::get('/users', [UserController::class, 'getAllUsers']);

/* Route::post('/upload', [UploadController::class, 'store'])->name('upload.store'); */

/* use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function () {
    return 'API is working';
});
