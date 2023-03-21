<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\NotificationController;

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
});

Route::get('/dashboard', [VacancyController::class, 'index'])->middleware(['auth', 'verified'])->name('vacancy.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->middleware(['auth', 'verified'])->name('vacancy.create');
Route::get('/vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacancy.edit');
Route::get('/vacancies/{vacancy}', [VacancyController::class, 'show'])->name('vacancy.show');

// Notifications
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified'])->name('notifications');

require __DIR__.'/auth.php';
