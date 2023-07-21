<?php

use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::permanentRedirect('/', 'tasks');

Route::middleware(['auth'])->prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/', [TaskController::class, 'store'])->name('task.store');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('task.delete');
});

Auth::routes();
