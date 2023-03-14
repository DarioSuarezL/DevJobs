<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApplyVacancy extends Component
{

    public $cv;
    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function submit()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
