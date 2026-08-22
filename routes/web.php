<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Public Display
Route::get('/', [DisplayController::class, 'index'])->name('display');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Agenda CRUD Split
    Route::get('/agendas/pimpinan', [AdminController::class, 'pimpinanIndex'])->name('agendas.pimpinan');
    Route::get('/agendas/umum', [AdminController::class, 'umumIndex'])->name('agendas.umum');
    Route::get('/calendar', [AdminController::class, 'calendarIndex'])->name('calendar');
    Route::get('/calendar/export/excel', [AdminController::class, 'exportExcel'])->name('calendar.export.excel');
    Route::get('/calendar/export/pdf', [AdminController::class, 'exportPdf'])->name('calendar.export.pdf');
    Route::get('/api/events', [AdminController::class, 'apiEvents'])->name('api.events');
    
    // Shared Create/Edit
    Route::get('/agendas/create', [AdminController::class, 'create'])->name('agendas.create');
    Route::post('/agendas', [AdminController::class, 'store'])->name('agendas.store');
    Route::get('/agendas/{agenda}/edit', [AdminController::class, 'edit'])->name('agendas.edit');
    Route::put('/agendas/{agenda}', [AdminController::class, 'update'])->name('agendas.update');
    Route::delete('/agendas/{agenda}', [AdminController::class, 'destroy'])->name('agendas.destroy');
});
