<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\BloggerProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/bloggers/{bloggerprofile?}', function ($bloggerprofile = null) {
//     return view('bloggers', ['bloggerprofile' => $bloggerprofile]);
// })->name('bloggers');

Route::prefix('bloggers')->group(function () {
    Route::get('/', [BloggerController::class, 'index'])->name('bloggers');
    Route::get('/{profile}', [BloggerController::class, 'show'])->name('bloggers.profile');
});


Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{project}', action: [ProjectController::class, 'show'])->name('projects.project');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/projects', [ProjectController::class, 'userProjects'])->name('projects.user');
});

Route::middleware(['auth'])->prefix('blogger/profile')->group(function () {
    Route::get('/', [BloggerProfileController::class, 'show'])->name('blogger.profile');
    Route::get('/edit', [BloggerProfileController::class, 'edit'])->name('blogger.profile.edit');
    Route::patch('/', [BloggerProfileController::class, 'update'])->name('blogger.profile.update');
});

require __DIR__.'/auth.php';
