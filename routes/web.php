<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require app_path('Modules/Page/routes.php');
require app_path('Modules/Service/routes.php');
require app_path('Modules/Portfolio/routes.php');
require app_path('Modules/Team/routes.php');
require app_path('Modules/Testimonial/routes.php');
require app_path('Modules/ContactLead/routes.php');
require __DIR__.'/auth.php';