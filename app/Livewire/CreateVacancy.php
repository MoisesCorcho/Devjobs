<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{
    use WithFileUploads;

    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    protected $rules = [
        'title'       => ['required', 'string'],
        'salary'      => ['required'],
        'category'    => ['required'],
        'company'     => ['required'],
        'last_day'    => ['required'],
        'description' => ['required'],
        'image'       => ['required', 'image', 'max:1024'],
    ];

    public function createVacancy()
    {
        // la funcion validate() funciona gracias a que
        // las reglas se establecieron con el nombre $rules.
        $data = $this->validate();
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
