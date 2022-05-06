<?php

namespace App\Repositories;

use App\Contracts\PlanRepositoryInterface;
use App\Models\Plan;

class PlanRepository extends BaseRepository implements PlanRepositoryInterface
{
    public function __construct(Plan $plan)
    {
        parent::__construct($plan);
    }
}
