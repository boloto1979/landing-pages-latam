<?php

use App\Models\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/landing/{slug}', function ($slug) {
    $page = LandingPage::where('slug', $slug)->firstOrFail();
    return view('landing.livewire-show', compact('page','slug'));
})->name('landing.show');

