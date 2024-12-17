<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

class LandingPageController extends Controller
{
    public function show($slug)
    {
        $page = LandingPage::where('slug', $slug)->firstOrFail();

        return view('landing.show', compact('page'));
    }
}
