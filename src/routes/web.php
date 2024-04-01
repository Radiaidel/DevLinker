<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Login
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/feed', [FeedController::class, 'index'])->name('feed');
    Route::get('/profile', [ProfileController::class , 'show'])->name('profile.show');
    Route::post('/update-cover-image', [ProfileController::class, 'updateCoverImage'])->name('update.cover.image');
    Route::post('/update-profile-image', [ProfileController::class, 'updateProfileImage'])->name('update.profile.image');
    Route::post('/add-experience', [ProfileController::class, 'addExperience'])->name('add.experience');
});
