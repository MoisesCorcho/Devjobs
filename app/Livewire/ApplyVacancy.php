<?php

namespace App\Livewire;

use App\Models\Applicant;
use App\Notifications\newApplicant;
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
        $this->validate();

        $cvPath = $this->cv->store('public/cv');

        $cvName = str_replace('public/cv/', '', $cvPath);

        $this->vacancy->applicants()->create([
            'user_id' => auth()->user()->id,
            'cv'      => $cvName,
        ]);

        $this->vacancy->recruiter->notify(
            new newApplicant(
                $this->vacancy->id ,
                $this->vacancy->title,
                auth()->user()->id
            )
        );

        $unreadNotifications = $this->vacancy->recruiter->unreadNotifications->count();
        event(new \App\Events\SeeNotifications($unreadNotifications));

        event(new \App\Events\SeeApplicants($this->vacancy));

        return redirect()->back()->with('message', 'Applied Successfully');
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
