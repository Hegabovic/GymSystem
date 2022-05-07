<?php

namespace App\Repositories;

use App\Contracts\CoachRepositoryInterface;
use App\Models\Coach;

class CoachRepository extends BaseRepository implements CoachRepositoryInterface
{
    public function __construct(Coach $coach)
    {
        parent::__construct($coach);
    }
}
