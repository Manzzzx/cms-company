<?php 

use Modules\Page\Http\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/pages', [PageController::class, 'store']);
});