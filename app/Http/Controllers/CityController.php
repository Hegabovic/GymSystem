<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('cities/cities');
    }

    public function create(): Factory|View|Application
    {
        return view('cities/create');
    }
}
