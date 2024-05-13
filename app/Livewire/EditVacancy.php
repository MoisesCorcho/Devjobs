<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;

class EditVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    public function mount(Vacancy $vacancy)
    {
        $this->title       = $vacancy->title;
        $this->salary      = $vacancy->salary_id;
        $this->category    = $vacancy->category_id;
        $this->company     = $vacancy->company;
        $this->last_day    = Carbon::parse( $vacancy->last_day )->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image       = $vacancy->image;
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacancy', [
            'salaries'   => $salaries,
            'categories' => $categories
        ]);
    }
}
