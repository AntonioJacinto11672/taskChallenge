<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Route::post('/task', [TaskController::class, 'create'])->name('task.create');
Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::get('/task/updateStatus/{id}', [TaskController::class, 'updateStatusView'])->name('task.updateStatus');
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');


