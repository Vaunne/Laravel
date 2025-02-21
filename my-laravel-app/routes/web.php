<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

use App\Http\Controllers\NoteController;

Route::resource('notes', NoteController::class);