<?php

namespace App\Http\Controllers;

use App\Contracts\CoachRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CoachController extends Controller
{

    private CoachRepositoryInterface $coachRepository;

    public function __construct(CoachRepositoryInterface $coachRepository)
    {
        $this->coachRepository = $coachRepository;
    }

    public function index(): Factory|View|Application
    {
        $coaches = $this->coachRepository->all(10);
        return view('coaches.show', ['coaches' => $coaches]);
    }

    public function create(): Factory|View|Application
    {
        return view('coaches.create');
    }
}
