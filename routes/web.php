<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenelitiansController;
use App\Http\Controllers\PengabdiansController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/penelitians', [PenelitiansController::class, 'index']);
Route::get('/penelitians/grid', [PenelitiansController::class, 'grid']);
// Route::get('/penelitians/create', [PenelitiansController::class, 'create']);
Route::resource('/penelitians', PenelitiansController::class);

Route::get('/pengabdians/grid', [PengabdiansController::class, 'grid']);
Route::resource('/pengabdians', PengabdiansController::class);

Route::get('/login', [AuthController::class, 'index']);
Route::post('loginUser', [AuthController::class, 'loginUser']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user', [UserController::class, 'index']);