<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('coaches/coaches');
    }

    public function create(): Factory|View|Application
    {
        return view('coaches/create_coach');
    }
}
