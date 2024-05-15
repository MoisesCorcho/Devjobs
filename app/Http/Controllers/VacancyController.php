<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Vacancy::class);

        return view('vacancies.index');
    }

    public function create()
    {
        $this->authorize('create', Vacancy::class);

        return view('vacancies.create');
    }

    public function edit(Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        return view('vacancies.edit', [
            'vacancy' => $vacancy
        ]);
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show', [
            'vacancy' => $vacancy
        ]);
    }
}
