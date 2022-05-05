<?php

namespace App\Repositories;

use App\Contracts\ClerkRepositoryInterface;
use App\Models\CityManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CityManagerRepository extends BaseRepository implements ClerkRepositoryInterface
{
    private CityManager $cityManager;
    public function __construct(CityManager $cityManager)
    {
        parent::__construct($cityManager);
        $this->cityManager=$cityManager;
    }
    public function updateavatar($id,$path)
    {
        $gymManager=$this->cityManager->find($id);
        $oldAvatarPath=$gymManager->avatar_path;
        File::delete(public_path( Storage::url($oldAvatarPath)));
        $gymManager->update(['avatar_path'=>$path]);

    }
}
