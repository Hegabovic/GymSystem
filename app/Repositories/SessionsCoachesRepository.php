<?php

namespace App\Repositories;

use App\Contracts\SessionsCoachesRepositoryInterface;
use App\Models\SessionsCoaches;

class SessionsCoachesRepository extends BaseRepository implements SessionsCoachesRepositoryInterface
{

    public function __construct(SessionsCoaches $sessionsCoaches)
    {
        parent::__construct($sessionsCoaches);
    }
}
