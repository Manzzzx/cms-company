<?php

use Modules\ContactLead\Http\ContactLeadController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contact-leads', [ContactLeadController::class, 'index'])->name('contact-leads.index');
    Route::delete('/contact-leads/{contactLead}', [ContactLeadController::class, 'destroy'])->name('contact-leads.destroy');
});
