<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function show()
    {
        $gyms = Gym::all();
        return view('gyms.show_gym', ['gyms' => $gyms]);
    }
}
