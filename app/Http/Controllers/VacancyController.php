<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        return view('vacancies.index');
    }

    public function create()
    {
        return view('vacancies.create');
    }

    public function edit(Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        return view('vacancies.edit', [
            'vacancy' => $vacancy
        ]);
    }
}
