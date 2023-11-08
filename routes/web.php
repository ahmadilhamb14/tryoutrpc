<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\RegisterController;

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
    return view('home', [
        "title" => "Home",
    // $this->authorize('admin')    
    ]);
})->middleware('auth');

Route::get('/tryout', function () {
    return view('tryout', [
        "title" => "Tryout",
    ]);
})->middleware('auth');

Route::resource('/users', UserController::class)->middleware('auth');

// Route::get('/users', [UserController::class, 'index']);



Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/signin', [RegisterController::class, 'store'])->middleware('guest');

Route::resource('/results', ScoreController::class)->middleware('auth');

Route::get('/profile', function () {
    return view('profile', [
        "title" => "Home",
    ]);
})->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


