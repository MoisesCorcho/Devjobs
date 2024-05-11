<?php

namespace App\Http\Controllers;

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
}
