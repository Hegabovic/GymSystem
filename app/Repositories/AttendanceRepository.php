<?php

namespace App\Repositories;

use App\Contracts\AttendanceRepositoryInterface;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{
    public function __construct(Attendance $attendance)
    {
        parent::__construct($attendance);
    }
}
