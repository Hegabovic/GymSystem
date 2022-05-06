<?php

namespace App\Http\Controllers;

use App\Contracts\AttendanceRepositoryInterface;
use App\Contracts\TrainingSessionsRepositoryInterface;
use Illuminate\Http\Request;

class attendanceController extends Controller
{

    private AttendanceRepositoryInterface $attendanceRepository;
    private TrainingSessionsRepositoryInterface $trainingSessionsRepository;

    public function __construct(AttendanceRepositoryInterface $attendanceRepository, TrainingSessionsRepositoryInterface $trainingSessionsRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
        $this->trainingSessionsRepository = $trainingSessionsRepository;
    }

    public function show()
    {
        $attendances = $this->attendanceRepository->all();
        return view('attendance/show_attendance', ['items' => $attendances, 'userData' => request()->user()]);
    }

    public function create()
    {
        return view('attendance/create_attendance');
    }

    public function store(Request $request)
    {
        $data = request()->all();
        $userData = $request->user();
        $attendance = $this->attendanceRepository->create(
            [
                'customer_id' => $userData['id'],
                'gym_id' => $data['gym_id'],
                'training_session_id' => $data['training_session_name'],

            ]);
        return to_route('show.attendances');
    }

    public function restore()
    {
        $data = request()->input('id');
        $post = $this->attendanceRepository->allWithTrashed()->where('id', $data)->first();
        $post->restore();
        $post->save();
        return to_route('show.attendances');
    }

    public function delete()
    {
        $attendanceId = request()->input('id');

        $result = $this->attendanceRepository->delete($attendanceId);

        if ($result) {
            return ['success' => 'true'];
        }

        return ['success' => 'false', 'message' => "Couldn't delete selected attendance successfully"];
    }

    public function edit($id)
    {
        $attendances = $this->attendanceRepository->all();
        $selectedAttendance = $this->attendanceRepository->findById($id);

        return view('attendance/editAttendance', ['attendances' => $attendances, 'thisAttendance' => $selectedAttendance]);
    }

    public function update(Request $request, $attendance_id)
    {
        $training_session = $this->trainingSessionsRepository->findById($attendance_id);
        $this->attendanceRepository->update($attendance_id, [
            "customer_id" => $request->user,
            "gym_id" => $request->gym,
            "training_session_id" => $request->training_session,
        ]);
        return to_route('show.attendances');
    }
}
