<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(VacancyController::class)->group(function() {
    Route::get('dashboard', 'index')->name('vacancies.index');
    Route::get('vacancies/create', 'create')->name('vacancies.create');
    Route::get('vacancies/{vacancy}/edit', 'edit')->name('vacancies.edit');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', [VacancyController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('vacancies.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
