<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\BloggerProfile;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/bloggers/{bloggerprofile?}', function ($bloggerprofile = null) {
    return view('bloggers', ['bloggerprofile' => $bloggerprofile]);
})->name('bloggers');

Route::get('/projects', [ProjectCongroller::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
