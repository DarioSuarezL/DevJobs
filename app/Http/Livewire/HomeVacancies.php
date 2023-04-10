<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class HomeVacancies extends Component
{
    public $payment;
    public $category;
    public $term;
    protected $listeners = ['searchTerm' => 'findTerm'];
    
    public function findTerm($term, $category, $payment){
        $this->term = $term;
        $this->category = $category;
        $this->payment = $payment;
    }

    public function render()
    {
        //$vacancies = Vacancy::all();

        $vacancies = Vacancy::when($this->term, function($query) {
            $query->where('title', 'LIKE', "%".$this->term."%");
        })
        ->when($this->term, function($query) {
            $query->orWhere('company', 'LIKE', "%".$this->term."%");
        })
        ->when($this->category, function($query) {
            $query->where('category_id', '=', $this->category);
        })
        ->when($this->payment, function($query) {
            $query->where('payment_id', '=', $this->payment);
        })
        ->paginate(20);

        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
