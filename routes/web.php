<?php
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/landing/{slug}', [LandingPageController::class, 'show'])->name('landing.show');
