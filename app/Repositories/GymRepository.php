<?php

namespace App\Repositories;

use App\Contracts\GymRepositoryInterface;
use App\Models\Gym;

class GymRepository extends BaseRepository implements GymRepositoryInterface
{

    public function __construct(Gym $gym)
    {
        parent::__construct($gym);
    }
}
