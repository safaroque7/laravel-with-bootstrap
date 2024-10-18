<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add-new-service', [ServiceController::class, 'index'])->name('add-new-service');
    Route::post('/add-new-service-store', [ServiceController::class, 'store'])->name('add-new-service-store');
    Route::get('/edit-service-item/{id}', [ServiceController::class, 'edit'])->name('edit-service-item');
    Route::get('/update-service-item/{id}', [ServiceController::class, 'update'])->name('update-service-item');
    Route::get('/delete-service-item/{id}', [ServiceController::class, 'delete'])->name('delete-service-item');

});

require __DIR__.'/auth.php';