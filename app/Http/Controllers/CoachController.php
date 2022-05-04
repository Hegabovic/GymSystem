<?php

namespace App\Http\Controllers;

use App\Contracts\CoachRepositoryInterface;
use App\Http\Requests\StoreCoachRequest;
use App\Models\Attendance;
use App\Models\Coach;
use App\Models\SessionsCoaches;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CoachController extends Controller
{

    private CoachRepositoryInterface $coachRepository;

    public function __construct(CoachRepositoryInterface $coachRepository)
    {
        $this->coachRepository = $coachRepository;
    }

    public function index(): Factory|View|Application
    {
        $coaches = $this->coachRepository->all();
        return view('coaches.show', ['coaches' => $coaches]);
    }

    public function delete()
    {
        $coachId = request()->input('id');
        $result = $this->coachRepository->delete($coachId);
        if ($result > 0)
            return ["success" => true];

        else
            return ["success" => false];
    }

    public function edit($coachId)
    {
        $selectedCoach = $this->coachRepository->findById($coachId);
        return view('coaches.edit', ['coach' => $selectedCoach]);
    }

    public function storeEdit(StoreCoachRequest $request)
    {
        $formData = $request->all();
        $updatedCoach = [
            "name" => $formData["name"],
            "phone" => $formData["phone"],
            "address" => $formData["address"]
        ];
        $this->coachRepository->update($request->id, $updatedCoach);

        return to_route('show_coaches');
    }

    public function create(): Factory|View|Application
    {
        return view('coaches.create');
    }

    public function store(StoreCoachRequest $request): RedirectResponse
    {
        $this->coachRepository->create([
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address
        ]);
        return to_route('show_coaches');
    }
}
