<?php

namespace App\Http\Controllers;

use App\Contracts\CityRepositoryInterface;
use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityRepositoryInterface $cityRepository;

    public function __construct(CityRepositoryInterface $cityRepository)
    {

        $this->cityRepository = $cityRepository;
    }

    public function index(): Factory|View|Application
    {
        $cities = $this->cityRepository->all();
        return view('cities.cities', [
            'cities' => $cities,
        ]);
    }

    public function create(): Factory|View|Application
    {
        $cities = City::all();
        return view('cities.create', [
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {

        $this->cityRepository->create([
            'name' => $request['cityName'],
        ]);
        return to_route('show_cities');
    }

    public function edit($cityID)
    {
        $city = City::find($cityID);

        return view('cities.edit', [
            'city' => $city,
        ]);
    }

    public function update(Request $request, $cityID)
    {
        $city = City::find($cityID);

        $city->update([
            'name' => $request->cityName,
        ]);
        return to_route('show_cities');
    }

    public function delete()
    {
        $cityID = request()->input('id');
        $selectedCity = City::find($cityID);
        if ($selectedCity) {
            $result = $selectedCity->delete();
            if ($result > 0) {
                return ['success' => true];
            } else {
                return ['success' => false, 'msg' => 'something went wrong!!'];
            }
        }
        return ['success' => false, 'msg' => 'city doesnt exist!!'];
    }
}
