<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingSessionRequest;
use App\Repositories\TrainingSessionsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    private TrainingSessionsRepository $trainingSessionsRepository;

    public function __construct(TrainingSessionsRepository $trainingSessionsRepository)
    {
        $this->trainingSessionsRepository = $trainingSessionsRepository;
    }

    public function index(): Factory|View|Application
    {
        $trainingSessions = $this->trainingSessionsRepository->all();
        return view('trainingSessions.show', ['trainingSessions' => $trainingSessions]);
    }

    public function delete()
    {
        $coachId = request()->input('id');

        $result = $this->trainingSessionsRepository->delete($coachId);
        if ($result > 0)
            return ["success" => true];

        else
            return ["success" => false, "message" => "Delete hasn't completed successfully."];
    }

    public function edit($coachId)
    {

        $selectedTrainingSession = $this->trainingSessionsRepository->findById($coachId);
        return view('trainingSessions.edit', ['trainingSession' => $selectedTrainingSession]);
    }

    public function storeEdit(StoreTrainingSessionRequest $request)
    {

        $formData = $request->all();
        $updatedTrainingSession = [
            "name" => $request->name,
            "start_at" => $request->startAt,
            "finish_at" => $request->finishAt
        ];
        $this->trainingSessionsRepository->update($request->id, $updatedTrainingSession);

        return to_route('show_trainingSessions');
    }

    public function create(): Factory|View|Application
    {
        return view('trainingSessions.create', ['isOverlap' => false]);
    }

    public function store(StoreTrainingSessionRequest $request): View|Factory|Application|RedirectResponse
    {
        $isLegalTime = $this->trainingSessionsRepository->isLegal($request->startAt, $request->finishAt);

        if ($isLegalTime) {
            $this->trainingSessionsRepository->create([
                "name" => $request->name,
                "start_at" => $request->startAt,
                "finish_at" => $request->finishAt
            ]);
            return to_route('show_trainingSessions');
        } else
            return view('trainingSessions.create', ['isOverlap' => true]);
    }
}
