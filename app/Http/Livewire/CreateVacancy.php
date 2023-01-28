<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Payment;
use Livewire\Component;

class CreateVacancy extends Component
{

    public $title;
    public $payment;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    protected $rules = [
        'title' => 'required|string',
        'payment' => 'required|numeric',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required',
    ];

    public function render()
    {
        //Consultar BD
        $pay = Payment::all();
        $cat = Category::all();
        return view('livewire.create-vacancy', [
            'payments' => $pay,
            'categories' => $cat
        ]);
    }

    public function createVacancy()
    {
        $data = $this->validate();
    }
}
