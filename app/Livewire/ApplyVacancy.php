<?php

namespace App\Livewire;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    public $vacancy;
    public $cv;

    protected $rules = [
        'cv' => ['required', 'mimes:pdf']
    ];

    public function applyVacancy()
    {
        $data = $this->validate();

        $cvPath = $this->cv->store('public/cv');

        $cvName = str_replace('public/cv/', '', $cvPath);

        $this->vacancy->applicants()->create([
            'user_id' => auth()->user()->id,
            'cv'      => $cvName,
        ]);

        return redirect()->back()->with('message', 'Applied Successfully');
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
