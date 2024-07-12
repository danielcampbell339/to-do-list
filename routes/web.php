<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', TaskController::class)->name('tasks');
Route::post('/task', [TaskController::class, 'store'])->name('task.create');
Route::post('/task/done/{task}', [TaskController::class, 'done'])->name('task.done');
Route::delete('/task/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');
