<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LandingPage;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;

class CustomPage extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $title;
    public $slug;
    public $route;
    public $primary_color;
    public $content = [];

    public function mount(): void
    {
        $this->title = '';
        $this->primary_color = '#f0f0f0';
        $this->content = [
            ['heading' => '', 'body' => ''],
        ];

        $this->form->fill([
            'title' => $this->title,
            'slug' => $this->slug,
            'route' => $this->route,
            'primary_color' => $this->primary_color,
            'content' => $this->content,
        ]);
    }

    public function addContentBlock()
    {
        $this->content[] = ['heading' => '', 'body' => ''];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $landingPage = LandingPage::create($data);

        session()->flash('message', 'Página criada com sucesso!');

        return redirect()->route('landing-page.preview', ['slug' => $landingPage->slug]);
    }

    public function render()
    {
        return view('livewire.custom-page', [
            'preview' => [
                'title' => $this->title,
                'primary_color' => $this->primary_color,
                'content' => $this->content,
            ],
        ]);
    }

}
