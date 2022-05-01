<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CoachController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('coaches.show');
    }

    public function create(): Factory|View|Application
    {
        return view('coaches.create');
    }
}
