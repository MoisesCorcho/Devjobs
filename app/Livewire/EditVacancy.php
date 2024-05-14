<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Livewire\WithFileUploads;

class EditVacancy extends Component
{
    use WithFileUploads;

    public $id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $new_image;

    protected $rules = [
        'title'       => ['required', 'string'],
        'salary'      => ['required'],
        'category'    => ['required'],
        'company'     => ['required'],
        'last_day'    => ['required'],
        'description' => ['required'],
        'new_image'   => ['nullable' ,'image', 'max:1024'],
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->id          = $vacancy->id;
        $this->title       = $vacancy->title;
        $this->salary      = $vacancy->salary_id;
        $this->category    = $vacancy->category_id;
        $this->company     = $vacancy->company;
        $this->last_day    = Carbon::parse( $vacancy->last_day )->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image       = $vacancy->image;
    }

    public function updateVacancy()
    {
        $data = $this->validate();

        $vacancy = Vacancy::find($this->id);

        if ( $this->new_image ) {
            $newImagePath = $this->new_image->store('public/vacancies');

            $imageName = str_replace('public/vacancies/', '', $newImagePath);
        }


        $vacancy->update([
            'title'       => $data['title'],
            'company'     => $data['company'],
            'last_day'    => $data['last_day'],
            'description' => $data['description'],
            'salary_id'   => $data['salary'],
            'category_id' => $data['category'],
            'image'       => $imageName ?? $vacancy->image,
        ]);

        return redirect()->route('vacancies.index')->with('message', 'Vacancy updated successfully');

        dd($vacancy);
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
