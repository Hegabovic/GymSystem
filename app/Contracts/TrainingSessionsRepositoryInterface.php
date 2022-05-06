<?php

namespace App\Contracts;

interface TrainingSessionsRepositoryInterface
{
    function isLegal($startDate, $endDate): bool;
}
