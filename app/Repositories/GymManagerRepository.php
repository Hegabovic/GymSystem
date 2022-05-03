<?php

namespace App\Repositories;

use App\Models\GymManager;
use Illuminate\Database\Eloquent\Model;

class GymManagerRepository extends BaseRepository
{
    public function __construct(GymManager $gymManager)
    {
        parent::__construct($gymManager);
    }
}
