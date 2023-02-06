<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditVacancy extends Component
{
    public $vacancy_id;
    public $title;
    public $payment;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'payment' => 'required|numeric',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024',
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy_id = $vacancy->id;
        $this->title = $vacancy->title;
        $this->payment = $vacancy->payment_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->last_day = Carbon::parse($vacancy->last_day)->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    public function editVacancy()
    {
        $data = $this->validate();

        // Hay una imagen
        if($this->new_image){
            $image = $this->new_image->store('public/vacancies');
            $data['image'] = str_replace('public/vacancies/','',$image);
        }

        // Apuntar vacante y actualizar los valores
        $vacancy = Vacancy::find($this->vacancy_id);
        $vacancy->title = $data['title'];
        $vacancy->payment_id = $data['payment'];
        $vacancy->category_id = $data['category'];
        $vacancy->company = $data['company'];
        $vacancy->last_day = $data['last_day'];
        $vacancy->description = $data['description'];
        $vacancy->image = $data['image'] ?? $vacancy->image;
        $vacancy->save();

        // Redireccionar
        session()->flash('message', 'Changes were saved successfully');
        return redirect()->route('vacancy.index');

    }

    public function render()
    {
        $pay = Payment::all();
        $cat = Category::all();
        return view('livewire.edit-vacancy', [
            'payments' => $pay,
            'categories' => $cat
        ]);
    }
}
