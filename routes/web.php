<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

// Public Portfolio Routes
Route::get('/', [ProjectController::class, 'index'])->name('portfolio');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/contact', [ProjectController::class, 'contact'])->name('contact.submit');

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard CRUD Routes (Protected)
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', AdminProjectController::class);
});
