<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
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

// Route::get('/tryout', function () {
//     return view('tryout', [
//         "title" => "Tryout",
//     ]);
// })->middleware('auth');

// Route::get('/tryout/kelola', function () {
//     return view('kelola', [
//         "title" => "Kelola Tryout",
//     ]);
// })->middleware('admin');

// Route::resource('/tryout/kelola', TryoutController::class)->middleware('admin');
Route::resource('/tryout', TryoutController::class)->middleware('auth');
// Route::get('/tryout/{tryoutId}/filter-questions', [TryoutController::class, 'show'])->name('filterQuestions');

// Route::get('/tryout/kelola/tambahsoal', function () {
//     return view('tambahsoal', [
//         "title" => "Tambah Soal",
//     ]);
// })->middleware('admin');

Route::get('/tryout/review', function () {
    return view('review', [
        "title" => "Review Tryout",
    ]);
})->middleware('auth');
// Route::get('/tryout/1/soaltryout', function () {
//     return view('soaltryout', [
//         "title" => "SoalTryout",
//     ]);
// })->middleware('auth');

Route::resource('/tryout/{tryout:id}/soaltryout', QuestionController::class)->middleware('admin');

Route::get('/tryout/{tryout:id}/test', [QuestionController::class, 'test'])->middleware('auth');
Route::post('/submit-answer', [QuestionController::class, 'submitAnswer']);

Route::post('/tryout/{tryout:id}/test', [QuestionController::class, 'jawab']);

// Route::post('/tryout/{tryout:id}/soaltryout', [QuestionController::class, 'store']);

Route::resource('/users', UserController::class)->middleware('admin');

// Route::get('/users', [UserController::class, 'index']);



Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/signin', [RegisterController::class, 'store'])->middleware('guest');

Route::resource('/results', ScoreController::class)->middleware('auth');
Route::post('/results/detail', [ScoreController::class, 'show'])->middleware('auth');

// Route::get('/profile', function () {
//     return view('profile', [
//         "title" => "Home",
//     ]);
// })->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/edit/{user:id}', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/profile/edit/{user:id}', [ProfileController::class, 'update'])->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


// Export
Route::get('/results/export/excel', [ScoreController::class, 'export_excel'])->middleware('auth');


