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
        $blockLabels = [
            'banner'    => 'Home',
            'about'     => 'Sobre',
            'advantages'=> 'Vantagens',
            'events'    => 'Eventos',
            'blog'      => 'Blog',
            'challenges'=> 'Desafios',
            'evaluators'=> 'Avaliadores',
        ];

        $navItems = [];
        if (is_array($this->page->content)) {
            foreach ($this->page->content as $block) {
                $blockType = $block['type'] ?? null;
                if ($blockType && isset($blockLabels[$blockType])) {
                    $navItems[] = [
                        'label'  => $blockLabels[$blockType],
                        'anchor' => $blockType,
                    ];
                }
            }
        }

        return view('livewire.show-landing-page', [
            'page'     => $this->page,
            'navItems' => $navItems,
        ]);
    }
}
