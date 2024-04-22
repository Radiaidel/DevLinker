<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SaveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\UserController;

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


Route::post('/reset-password', [PasswordResetController::class, 'sendResetCode'])->name('password.reset.code');
Route::post('/update-password', [PasswordResetController::class, 'updatePassword'])->name('update.password');



// Logout


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


















Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



    Route::get('/feed', [FeedController::class, 'index'])->name('feed');
    Route::get('/load-more-projects', [FeedController::class, 'loadMoreProjects']);


    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/update-cover-image', [ProfileController::class, 'updateCoverImage'])->name('update.cover.image');
    Route::post('/update-profile-image', [ProfileController::class, 'updateProfileImage'])->name('update.profile.image');
    Route::post('/add-experience', [ProfileController::class, 'addExperience'])->name('add.experience');
    Route::post('/update-experience', [ProfileController::class, 'updateExperience'])->name('update.experience');
    Route::post('/experience/delete', [ProfileController::class, 'deleteExperience'])->name('delete.experience');
    Route::post('/add-education', [ProfileController::class, 'addEducation'])->name('education.store');
    Route::post('/update-education', [ProfileController::class, 'updateEducation'])->name('education.update');
    Route::post('/delete-education', [ProfileController::class, 'deleteEducation'])->name('education.delete');
    Route::post('/edit-profile-title',  [ProfileController::class, 'updateProfileTitle'])->name('edit.profile.title');
    Route::post('/edit-profile-about',  [ProfileController::class, 'updateProfileAbout'])->name('edit.profile.about');
    Route::post('/add-skill', [ProfileController::class, 'addSkill'])->name('add.skill');
    Route::get('/delete-skill',  [ProfileController::class, 'deleteSkill'])->name('delete.skill');
    Route::post('/add-language', [ProfileController::class, 'addLanguage'])->name('add.language');
    Route::post('/delete-language', [ProfileController::class, 'deleteLanguage'])->name('language.delete');




    Route::get('/preferences', [PreferencesController::class, 'show'])->name('preferences.show');
    Route::post('/preferences/update', [PreferencesController::class, 'update'])->name('preferences.update');
    Route::put('/preferences/name', [PreferencesController::class, 'updateName'])->name('preferences.update.name');
    Route::put('/preferences/email', [PreferencesController::class, 'updateEmail'])->name('preferences.update.email');
    Route::put('/update-password', [PreferencesController::class, 'updatePassword'])->name('preferences.update.password');

    Route::post('/update-email', [PreferencesController::class, 'updateEmail'])->name('update.email');
    Route::get('/email/verify/{token}', [PreferencesController::class, 'verifyEmail'])->name('email.verify');

    Route::delete('/delete-account', [PreferencesController::class, 'deleteAccount'])->name('delete-account');


    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::post('/render-project-view', [ProjectController::class, 'renderProjectView']);




    Route::post('/projects/like', [LikeController::class, 'like'])->name('project.like');
    Route::get('/projects/{project}/likes', [LikeController::class, 'viewLikes'])->name('projects.likes');


    Route::post('/projects/save', [SaveController::class, 'save'])->name('project.save');
    Route::get('/saved-items', [SaveController::class, 'getSavedItems'])->name('saved.items');



    Route::get('/projects/{project}', [CommentController::class, 'showComments'])->name('project.comments');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/explore', [FeedController::class, 'explore'])->name('explore');
    Route::post('/projects/search', [ProjectController::class, 'search'])->name('projects.search');


    Route::get('/network', [NetworkController::class, 'index'])->name('network');
    Route::post('/friend-requests/accept', [NetworkController::class, 'accept'])->name('friend-requests.accept');
    Route::post('/friend-requests/decline', [NetworkController::class, 'decline'])->name('friend-requests.decline');
    Route::post('/friend-requests/cancel', [NetworkController::class, 'cancel'])->name('friend-requests.cancel');
    Route::post('/connect',  [NetworkController::class, 'sendConnectionRequest'])->name('connect.send');




    Route::get('/search-users', [UserController::class, 'searchUsers']);


    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');


    Route::get('/chat', [ConversationController::class, 'index'])->name('chat');
    Route::post('/ReadMessages', [MessageController::class , 'readMessages']);
    Route::post('/messages/send', [MessageController::class , 'store'])->name('messages.store');
    Route::get('/user/conversations', [ConversationController::class, 'getUserConversations'])->name('user.conversations');
});
// 