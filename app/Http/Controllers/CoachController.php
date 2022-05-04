<?php

namespace App\Http\Controllers;

use App\Contracts\CoachRepositoryInterface;
use App\Http\Requests\StoreCoachRequest;
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

    public function showCoachesTable()
    {
//        $coaches = $this->coachRepository->all();
//        return datatables($query)->make(true);
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

        return back();
    }
}
