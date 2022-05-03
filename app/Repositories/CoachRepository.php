<?php

namespace App\Repositories;

use App\Contracts\CoachRepositoryInterface;
use App\Models\Coach;

class CoachRepository extends BaseRepository implements CoachRepositoryInterface
{
    private Coach $coach;

    public function __construct(Coach $coach)
    {
        parent::__construct($coach);
        $this->coach = $coach;
    }
}
