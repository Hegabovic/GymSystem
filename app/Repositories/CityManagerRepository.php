<?php

namespace App\Repositories;

use App\Models\CityManager;
use Illuminate\Database\Eloquent\Model;

class CityManagerRepository extends BaseRepository
{
    public function __construct(CityManager $cityManager)
    {
        parent::__construct($cityManager);
    }
}
