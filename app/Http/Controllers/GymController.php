<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function show()
    {
        $tableData=Gym::withTrashed()->get();
        $gyms = Gym::all();
        return view('gyms.show_gym', ['gyms' => $gyms]);
    }
}
