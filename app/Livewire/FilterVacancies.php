<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class FilterVacancies extends Component
{
    public $concept;
    public $salary;
    public $category;

    public function readFormData()
    {
        $this->dispatch('searchParams', $this->concept, $this->salary, $this->category);
    }

    public function render()
    {
        $categories = Category::all();
        $salaries = Salary::all();

        return view('livewire.filter-vacancies', [
            'categories' => $categories,
            'salaries' => $salaries
        ]);
    }
}
