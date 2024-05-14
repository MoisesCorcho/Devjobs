<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\Attributes\On;


class ShowVacancies extends Component
{

    #[On('deleteVacancie')]
    public function deleteVacancie( $id )
    {
        $vacancy = Vacancy::find($id);

        $this->authorize('delete', $vacancy);

        $vacancy->delete();
    }

    public function render()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
