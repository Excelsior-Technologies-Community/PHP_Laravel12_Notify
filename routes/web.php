<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestNotifyController;
use App\Http\Controllers\UserController;

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
});


Route::middleware('auth')->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});

Route::get('/test-notify', function () {
    notify()->success('Test notification working!');
    return redirect()->back();
});

Route::get('/test-notify', [TestNotifyController::class, 'index'])
    ->middleware('auth');
require __DIR__ . '/auth.php';
