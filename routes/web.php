<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([ApiKeyMiddleware::class])->group(function () {
    Route::get('/api/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/api/locations', [LocationController::class, 'index'])->name('locations.index');
});


/*Route::middleware(['auth'])->group(function () {
    Route::get('/locations', function () {
        return Inertia::render('Locations');
    })->name('locations.view');
});*/
Route::get('/locations', function () {
    return Inertia::render('Locations'); // busca ./pages/Locations.tsx
});

require __DIR__.'/auth.php';
