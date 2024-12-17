<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LandingPage;

class ShowLandingPage extends Component
{
    public $slug;
    public $page;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->page = LandingPage::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.show-landing-page', [
            'page' => $this->page,
        ]);
    }
}
