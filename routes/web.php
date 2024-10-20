<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

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


    Route::get('/add-new-client', [ClientController::class, 'index'])->name('add-new-client');
    Route::post('/store-new-client', [ClientController::class, 'store'])->name('store-new-client');
    Route::get('/all-clients', [ClientController::class, 'show'])->name('all-clients');

    Route::get('/edit-client/{id}', [ClientController::class, 'edit'])->name('edit-client');
    Route::post('/update-client/{id}', [ClientController::class, 'update'])->name('update-client');
    Route::get('/delete-client/{id}', [ClientController::class, 'delete'])->name('delete-client');


    Route::get('/single-client-info/{id}', [ClientController::class, 'showSingleClientInfo'])->name('single-client-info');

    Route::get('/facebook-review-left-email', [ClientController::class, 'facebookReviewLeftEmail'])->name('facebook-review-left-email');




});

require __DIR__.'/auth.php';
