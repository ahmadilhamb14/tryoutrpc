<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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
    ]);
});

Route::get('/tryout', function () {
    return view('tryout', [
        "title" => "Tryout",
    ]);
});

Route::resource('/users', UserController::class);

// Route::get('/users', [UserController::class, 'index']);



Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/signin', [RegisterController::class, 'store']);

Route::get('/results', function () {
    return view('results', [
        "title" => "Results",
    ]);
});

Route::get('/profile', function () {
    return view('profile', [
        "title" => "Home",
    ]);
});

