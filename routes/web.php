<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\BloggerProfile;
use App\Http\Controllers\BloggerController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/bloggers/{bloggerprofile?}', function ($bloggerprofile = null) {
//     return view('bloggers', ['bloggerprofile' => $bloggerprofile]);
// })->name('bloggers');

Route::prefix('bloggers')->group(function () {
    Route::get('/}', [BloggerController::class, 'index'])->name('bloggers');
    Route::get('/{bloggerprofile?}', [BloggerController::class, 'show'])->name('{bloggerprofile?}');
});

Route::get('/projects', [BloggerController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
