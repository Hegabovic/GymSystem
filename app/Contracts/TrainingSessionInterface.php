<?php

namespace App\Contracts;

interface TrainingSessionInterface
{
    function isLegal($startDate, $endDate): bool;
}
