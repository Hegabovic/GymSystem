<?php

namespace App\Repositories;


use App\Contracts\CityRepositoryInterface;
use App\Models\City;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $city)
    {
        parent::__construct($city);
    }
}
