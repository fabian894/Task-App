<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/tasks/{user_id}', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create/{user_id}', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/{user_id}', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{user_id}/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{user_id}/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{user_id}/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
