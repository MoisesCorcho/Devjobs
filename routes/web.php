<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

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

// Home Routes
Route::get('/', HomeController::class)->name('home');

// Vacancy Routes
Route::controller(VacancyController::class)->group(function() {
    Route::get('dashboard', 'index')->name('vacancies.index')->middleware('rol.recruiter');
    Route::get('vacancies/create', 'create')->name('vacancies.create');
    Route::get('vacancies/{vacancy}/edit', 'edit')->name('vacancies.edit');
    Route::get('vacancies/{vacancy}', 'show')->withoutMiddleware(['auth', 'verified'])->name('vacancies.show');
})->middleware(['auth', 'verified']);

// Applicant Routes
Route::get('applicants/{vacancy}', [ApplicantController::class, 'index'])
    ->name('applicants.index');

// Notifications Routes
Route::get('notifications', NotificationController::class)
    ->middleware(['auth', 'verified', 'rol.recruiter'])
    ->name('notifications');

// Authentication Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
