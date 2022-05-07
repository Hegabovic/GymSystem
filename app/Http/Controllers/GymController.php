<?php

namespace App\Http\Controllers;

use App\Contracts\AttendanceRepositoryInterface;
use App\Contracts\CityRepositoryInterface;
use App\Contracts\GymRepositoryInterface;
use Illuminate\Http\Request;

class GymController extends Controller
{


    private GymRepositoryInterface $gymRepository;
    private CityRepositoryInterface $cityRepository;
    private AttendanceRepositoryInterface $attendanceRepository;

    public function __construct(GymRepositoryInterface $gymRepository, CityRepositoryInterface $cityRepository, AttendanceRepositoryInterface $attendanceRepository)
    {
        $this->gymRepository = $gymRepository;
        $this->cityRepository = $cityRepository;
        $this->attendanceRepository = $attendanceRepository;
    }

    public function show()
    {
        $gyms = $this->gymRepository->all();
        return view('gyms.show', ['gyms' => $gyms]);
    }


    public function create()
    {


        $cities = $this->cityRepository->all();
        return view('gyms.create', [
            'cities' => $cities,
        ]);

    }

    public function delete()

    {
        $gymId = request()->input('id');
        $selectedGym = $this->gymRepository->findById($gymId);
        $NumberOfTrainingSession = $this->attendanceRepository->select(['training_session_id'])->where('gym_id', $gymId)->count();
        if ($selectedGym) {
            if ($NumberOfTrainingSession > 0) {
                return ["success" => false, "message" => "There is a training session in the gym"];
            } else {
                $isDeleted = $selectedGym->delete();
                return ["success" => true, "message" => "Record has been deleted"];
            }
        }
        return ["success" => false, "message" => "Couldn't find selected Gym"];
    }

    public function edit(Request $request, $id)
    {
        $gym = $this->gymRepository->findById($id);
        $cities = $this->cityRepository->all();
        return view('gyms.edit', ['gym' => $gym, 'cities' => $cities]);
    }

    public function storeUpdate(Request $request, $gymId)
    {
        $avatarPath = "";
        if ($request->hasFile('cover_image')) {
            $avatarPath = $request->file('cover_image')->store('public/gym images');
        } else {
            $avatarPath = $this->gymRepository->findById($gymId)->cover_image;
        }

        $this->gymRepository->update($gymId, [
            "name" => $request["name"],
            "cover_image" => $avatarPath,
            "city_id" => $request["city_id"]
        ]);

        return to_route('show_gyms');
    }

    public function store(Request $request)
    {
        $avatarPath = "";
        if ($request->hasFile('cover_image')) {
            $avatarPath = $request->file('cover_image')->store('public/gym images');
        }

        $this->gymRepository->create([
            "name" => $request ['name'],
            "cover_image" => $avatarPath,
            "city_id" => $request ['city_id']
        ]);

        return to_route('show_gyms');
    }
}





