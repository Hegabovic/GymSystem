<?php

namespace App\Http\Controllers;

use App\Contracts\AttendanceRepositoryInterface;
use App\Contracts\SessionsCoachesRepositoryInterface;
use App\Contracts\TrainingSessionsRepositoryInterface;
use App\Http\Requests\StoreTrainingSessionRequest;
use App\Repositories\CoachRepository;
use App\Repositories\TrainingSessionsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    private TrainingSessionsRepositoryInterface $trainingSessionsRepository;
    private AttendanceRepositoryInterface $attendanceRepository;
    private SessionsCoachesRepositoryInterface $sessionsCoachesRepository;
    private CoachRepository $coachRepository;

    public function __construct(TrainingSessionsRepositoryInterface $trainingSessionsRepository,
                                AttendanceRepositoryInterface       $attendanceRepository,
                                SessionsCoachesRepositoryInterface  $sessionsCoachesRepository,
                                CoachRepository                     $coachRepository)
    {
        $this->trainingSessionsRepository = $trainingSessionsRepository;
        $this->attendanceRepository = $attendanceRepository;
        $this->sessionsCoachesRepository = $sessionsCoachesRepository;
        $this->coachRepository = $coachRepository;
    }

    public function index(): Factory|View|Application
    {
        $trainingSessions = $this->trainingSessionsRepository->all();
        return view('trainingSessions.show', ['trainingSessions' => $trainingSessions]);
    }

    public function delete()
    {
        $trainingSessionId = request()->input('id');
        $attendanceCount = $this->attendanceRepository->selectCountOfUsersBySessionId($trainingSessionId);

        if ($attendanceCount == 0) {
            $result = $this->trainingSessionsRepository->delete($trainingSessionId);
            if ($result > 0)
                return ["success" => true];

            else
                return ["success" => false, "message" => "Delete hasn't completed successfully."];
        } else {
            return ["success" => false, "message" => "Cannot delete session because someone is attending in."];
        }
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
        $coaches = $this->coachRepository->all();
        return view('trainingSessions.create', ['isOverlap' => false, 'coaches' => $coaches]);
    }

    public function store(StoreTrainingSessionRequest $request): View|Factory|Application|RedirectResponse
    {
        $isLegalTime = $this->trainingSessionsRepository->isLegal($request->startAt, $request->finishAt);
        $coaches = $this->coachRepository->all();

        if ($isLegalTime) {
            $trainingSessionId = $this->trainingSessionsRepository->create([
                "name" => $request->name,
                "start_at" => $request->startAt,
                "finish_at" => $request->finishAt
            ]);

            $this->sessionsCoachesRepository->create([
                "coach_id" => $request->coachId,
                "session_id" => $trainingSessionId
            ]);
            return to_route('show_trainingSessions');
        } else
            return view('trainingSessions.create', ['isOverlap' => true, 'coaches' => $coaches]);
    }
}
