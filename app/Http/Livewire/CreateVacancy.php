<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{

    public $title;
    public $payment;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'payment' => 'required|numeric',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
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

        //almacenar imagen
        $image = $this->image->store('public/vacancies');
        $data['image'] = str_replace('public/vacancies/','',$image);
        
        //crear vacante
        Vacancy::create([
            'title' => $data['title'],
            'payment_id' => $data['payment'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]);

        //crear mensaje
        session()->flash('message','The vacancy has been successfully published');

        //redireccionar
        return redirect()->route('vacancy.index');
    }
}
