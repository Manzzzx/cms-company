<?php 

use Modules\Page\Http\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');
    Route::patch('/pages/{page}/toggle-status', [PageController::class, 'toggleStatus'])->name('pages.toggleStatus');
});