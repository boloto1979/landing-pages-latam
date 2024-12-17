<?php

namespace App\Livewire;

use App\Models\LandingPage;
use Livewire\Component;

class ShowLandingPage extends Component
{
    public $slug;
    public $landingPage;

    public function mount($slug)
    {
        $this->landingPage = LandingPage::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.show-landing-page', [
            'landingPage' => $this->landingPage,
        ]);
    }
}
