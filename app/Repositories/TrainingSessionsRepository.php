<?php

namespace App\Repositories;

use App\Contracts\TrainingSessionInterface;
use App\Models\Training_session;

class TrainingSessionsRepository extends BaseRepository implements TrainingSessionInterface
{

    public function __construct(Training_session $training_session)
    {
        parent::__construct($training_session);

    }

    function isLegal($startDate, $endDate): bool
    {
        $result = Training_session::whereBetween('start_at', [$startDate, $endDate])
            ->orWhereBetween('finish_at', [$startDate, $endDate])
            ->orWhereRaw('? BETWEEN start_at and finish_at', [$startDate])
            ->orWhereRaw('? BETWEEN start_at and finish_at', [$endDate])->get()->count();

        if ($result > 0)
            return false;
        return true;
    }
}
