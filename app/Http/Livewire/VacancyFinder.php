<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Payment;
use Livewire\Component;

class VacancyFinder extends Component
{
    public $payment;
    public $category;
    public $term;

    public function readForm(){
        $this->emit('searchTerm', $this->term, $this->category, $this->payment);
    }

    public function render()
    {
        $payments = Payment::all();
        $categories = Category::all();
        return view('livewire.vacancy-finder',[
            'payments' => $payments,
            'categories' => $categories
        ]);
    }
}
