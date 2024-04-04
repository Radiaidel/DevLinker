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
    Route::post('/update-experience', [ProfileController::class, 'updateExperience'])->name('update.experience');
    Route::post('/experience/delete', [ProfileController::class,'deleteExperience'])->name('delete.experience');
    Route::post('/add-education', [ProfileController::class, 'addEducation'])->name('education.store');
    Route::post('/update-education', [ProfileController::class, 'updateEducation'])->name('education.update');
    Route::post('/delete-education', [ProfileController::class, 'deleteEducation'])->name('education.delete');
    Route::post('/edit-profile-title',  [ProfileController::class, 'updateProfileTitle'])->name('edit.profile.title');
    Route::post('/edit-profile-about',  [ProfileController::class, 'updateProfileAbout'])->name('edit.profile.about');
    Route::post('/add-skill', [ProfileController::class, 'addSkill'])->name('add.skill');
    Route::get('/delete-skill',  [ProfileController::class,'deleteSkill'])->name('delete.skill');
    Route::post('/add-language', [ProfileController::class,'addLanguage'])->name('add.language');
});
