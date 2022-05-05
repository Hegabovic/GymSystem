<?php

namespace App\Repositories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;

class AttendanceRepository extends BaseRepository
{
    public function __construct(Attendance $attendance)
    {
        parent::__construct($attendance);
    }
}
