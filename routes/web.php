<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Laravel\Socialite\Facades\Socialite;
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
Route::post('/dashboard/{id}/defer', [TaskController::class, 'defer'])->name('task.defer');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');


require __DIR__.'/auth.php';


