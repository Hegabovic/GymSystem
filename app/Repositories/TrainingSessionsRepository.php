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
}
