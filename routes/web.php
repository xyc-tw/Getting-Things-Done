<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GoogleController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'add'])->name('add');
// Route::get('/users/{user:name}/dashboard', [UserTaskController::class, 'index'])->name('user.dashboard');

Route::post('/dashboard/{id}/check', [TaskController::class, 'check'])->name('task.check');
Route::post('/dashboard/{id}/delete', [TaskController::class, 'destroy'])->name('task.delete');
Route::post('/dashboard/{id}/stuffs', [TaskController::class, 'stuffs'])->name('task.stuffs');
Route::post('/dashboard/{id}/maybe', [TaskController::class, 'maybe'])->name('task.maybe');
Route::post('/dashboard/{id}/lessthan2', [TaskController::class, 'lessthan2'])->name('task.lessthan2');
Route::post('/dashboard/{id}/defer', [TaskController::class, 'defer'])->name('task.defer');
Route::post('/dashboard/{id}/delegate', [TaskController::class, 'delegate'])->name('task.delegate');
Route::post('/dashboard/{id}/makeproject', [TaskController::class, 'makeproject'])->name('task.makeproject');
Route::post('/dashboard/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/dashboard/{id}/addtask', [ProjectController::class, 'addtask'])->name('project.addtask');
Route::post('/dashboard/{id}/deleteproject', [ProjectController::class, 'destroy'])->name('project.delete');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');


require __DIR__.'/auth.php';


