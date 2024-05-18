<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\Attributes\On;

class HomeVacancies extends Component
{
    public $concept;
    public $salary;
    public $category;

    #[On('searchParams')]
    public function search($concept, $salary, $category)
    {
        $this->concept = $concept;
        $this->salary = $salary;
        $this->category = $category;
    }

    public function render()
    {
        $vacancies = Vacancy::paginate(5);

        if ($this->concept || $this->salary || $this->category) {
            $vacancies = Vacancy::query()
                ->allowedFilters([
                    'title' => $this->concept,
                    'company' => $this->concept,
                    'salary' => $this->salary,
                    'category' => $this->category
                ])->paginate(10);
        }

        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
