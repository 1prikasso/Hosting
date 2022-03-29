<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ArticlesController;

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

Route::redirect('/', 'user/login');


// Login 
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login_store'])->name('user.login-store');

// registration
Route::get('/user/registration', [UserController::class, 'registration'])->name('user.registration');
Route::post('/user/registration', [UserController::class, 'registration_store'])->name('user.registration-store');;

// logout
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');


// Articles
Route::resource('articles', ArticlesController::class)->middleware('auth');
