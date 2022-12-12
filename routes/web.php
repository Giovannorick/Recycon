<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\UserController;
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
Route::get('/', [BaseController::class, 'homepage']);

// Register
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);

// Login
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

//Profile
Route::get('/editProfile', [UserController::class, 'editPage']);
Route::post('/editProfile', [UserController::class, 'editedProfile']);

Route::get('/changePassword', [UserController::class, 'changePassPage']);
Route::post('/changePassword', [UserController::class, 'updatePass']);


