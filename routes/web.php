<?php

use App\Livewire\ProjectDetails;
use App\Livewire\Projects;
use App\Livewire\BloggerList;
use App\Livewire\BloggerDetails;
use App\Livewire\BloggerProfileForm;
use App\Livewire\Dashboard;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\BloggerProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('bloggers')->group(function () {
//     Route::get('/', [BloggerController::class, 'index'])->name('bloggers');
//     Route::get('/{profile}', [BloggerController::class, 'show'])->name('bloggers.profile');
// });


// Route::get('/projects', [ProjectController::class, 'index'])->name('projects');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard/projects', [ProjectController::class, 'userProjects'])->name('projects.user');
});

// Route::middleware(['auth'])->prefix('blogger/profile')->group(function () {
//     Route::get('/', [BloggerProfileController::class, 'show'])->name('blogger.profile');
//     Route::get('/edit', [BloggerProfileController::class, 'edit'])->name('blogger.profile.edit');
//     Route::patch('/', [BloggerProfileController::class, 'update'])->name('blogger.profile.update');
// });


Route::middleware(['auth'])->prefix('blogger/profile')->group(
    function () {
        Route::get('/', BloggerProfileForm::class)->name('blogger.profile');
    }
);

Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
    }
);

Route::get('/projects', Projects::class)->name('projects');
Route::get('/projects/{project}', ProjectDetails::class)->name('project.details');


Route::get('/bloggers', BloggerList::class)->name('bloggers');
Route::get('/bloggers/{id}', BloggerDetails::class)->name('bloggers.profile');


require __DIR__ . '/auth.php';
