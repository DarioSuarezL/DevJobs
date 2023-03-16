<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use App\Notifications\NewCandidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacancy;

    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }


    public function submit()
    {
        $data = $this->validate();

        // Save the file
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);

        // Create candidate
        $data['user_id'] = auth()->user()->id;
        $this->vacancy->candidates()->create($data);

        // Show success message
        session()->flash('message', 'Your application has been submitted successfully, good luck!');

        // Send notification to the recruiter
        $this->vacancy->recruiter->notify(new NewCandidate($this->vacancy->id, $this->vacancy->title, auth()->user()->id));

        // Redirect to home page
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
