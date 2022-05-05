<?php

namespace App\Contracts;

interface AttendanceRepositoryInterface
{
    function selectCountOfUsersBySessionId($sessionId): int;
}
