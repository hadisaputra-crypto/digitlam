<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminJournalController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminLogController;
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

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// User dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Journal Management
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/journal/create', [JournalController::class, 'create'])->name('journal.create');
    Route::post('/journal', [JournalController::class, 'store'])->name('journal.store');
});

// Journal Public Routes (Must be after specific routes)
Route::get('/journal/{slug}', [JournalController::class, 'show'])->name('journal.show');
Route::get('/journal/{journal}/download', [JournalController::class, 'download'])
    ->middleware(['throttle:downloads'])
    ->name('journal.download');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('dashboard');
    Route::resource('journals', AdminJournalController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('users', AdminUserController::class);
    Route::get('logs', [AdminLogController::class, 'index'])->name('logs');
});
