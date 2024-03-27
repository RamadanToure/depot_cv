<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('cv', CVController::class);
    Route::get('/submit-cv', [CVController::class, 'showSubmitForm'])->name('cv.submit.form');
    Route::post('/submit-cv', [CVController::class, 'submit'])->name('cv.submit');
});

require __DIR__.'/auth.php';
