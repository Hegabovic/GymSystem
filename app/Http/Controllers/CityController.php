<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): Factory|View|Application
    {
        $cities = City::all();
        return view('cities.cities');
    }

    // =======================================================//
    public function create(): Factory|View|Application
    {
        $cities = City::all();
        return view('cities.create', [
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {
        City::create([
            'city_id' => $request->city_id,
            'city_name' => $request->city_name,
        ]);
        return to_route('cities.cities');
    }

    // =======================================================//
    public function delete($cityID)
    {
        City::findOrFail($cityID)->delete();
        return to_route('cities.cities');
    }

}
