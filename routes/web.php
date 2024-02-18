<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::post('/', [TaskController::class, 'store'])->name('task.store');
Route::get('/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/{id}', [TaskController::class, 'update'])->name('task.update');
Route::patch('/', [TaskController::class, 'patch'])->name('task.patch');
Route::delete('/', [TaskController::class, 'destroy'])->name('task.destroy');
