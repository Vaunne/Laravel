<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

use App\Http\Controllers\NoteController;

Route::resource('notes', NoteController::class);

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');