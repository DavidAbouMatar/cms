<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.custom'); 
Route::get ('logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth']], function () { 
Route::post('register', [RegisterController::class,'store'])->name('register');

Route::get('users', [UserController::class, 'index']);
Route::post('update', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
});