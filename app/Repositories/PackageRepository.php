<?php

namespace App\Repositories;

use App\Contracts\PackageRepositoryInterface;
use App\Models\Package;

class PackageRepository extends BaseRepository implements PackageRepositoryInterface
{
    private Package $package;

    public function __construct(Package $package)
    {
        parent::__construct($package);
        $this->package = $package;
    }
}