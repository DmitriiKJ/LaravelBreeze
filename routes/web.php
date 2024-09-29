<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CorrectRole;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, "Read"])->name('task.read');
Route::get('/create', [HomeController::class, 'create'])->name('task.create')->middleware(['auth', 'verified'])->middleware(CorrectRole::class);
Route::post('/assistant_create', [HomeController::class, "assistant_create"])->name('home.assistant_create')->middleware(['auth', 'verified']);
Route::get('/update/{id}', [HomeController::class, "Update"])->middleware(['auth', 'verified'])->middleware(CorrectRole::class);
Route::post('/assistant_update', [HomeController::class, "assistant_update"])->middleware(['auth', 'verified']);
Route::get('/delete/{id}', [HomeController::class, "Delete"])->name('task.create')->middleware(['auth', 'verified'])->middleware(CorrectRole::class);
Route::post('/assistant_delete', [HomeController::class, "assistant_delete"])->middleware(['auth', 'verified']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
