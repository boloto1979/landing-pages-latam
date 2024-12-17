<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LandingPage;

class LandingPageBuilder extends Component
{
    public $routeName;
    public $logo;
    public $primaryColor = '#ffffff';
    public $content = [];
    public $previewMode = false;
    public $landingPage;

public function mount($landingPageId = null)
{
    if ($landingPageId) {
        $this->landingPage = LandingPage::findOrFail($landingPageId);
        $this->routeName = $this->landingPage->route;
        $this->primaryColor = $this->landingPage->primary_color;
        $this->content = $this->landingPage->content ?? [];
    }
}

    public function addContentBlock()
    {
        $this->content[] = ['type' => 'paragraph', 'content' => ''];
    }

    public function removeContentBlock($index)
    {
        unset($this->content[$index]);
        $this->content = array_values($this->content);
    }

    public function save()
    {
        $this->validate([
            'routeName' => 'required|unique:landing_pages,route',
            'primaryColor' => 'required',
            'content' => 'required|array',
        ]);

        LandingPage::create([
            'route' => $this->routeName,
            'primary_color' => $this->primaryColor,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Landing Page salva com sucesso!');
        return redirect()->route('filament.resources.landing-pages.index');
    }



    public function render()
    {
        return view('livewire.landing-page-preview');
    }
}
