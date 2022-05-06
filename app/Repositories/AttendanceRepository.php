<?php

namespace App\Repositories;

use App\Contracts\AttendanceRepositoryInterface;
use App\Models\Attendance;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{
    public function __construct(Attendance $attendance)
    {
        parent::__construct($attendance);
    }

    function selectCountOfUsersBySessionId($sessionId): int
    {
        return Attendance::where('training_session_id', $sessionId)->count();
    }
}
