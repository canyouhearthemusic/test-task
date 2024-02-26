<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::controller(TaskController::class)->name('tasks.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::patch('/', 'patch')->name('patch');
    Route::delete('/', 'destroy')->name('destroy');
});

