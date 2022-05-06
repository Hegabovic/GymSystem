<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\CityManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CityManagerRepository extends BaseRepository implements UserRepositoryInterface
{
    private CityManager $cityManager;
    public function __construct(CityManager $cityManager)
    {
        parent::__construct($cityManager);
        $this->cityManager=$cityManager;
    }
    public function updateAvatar($id,$path)
    {
        $cityManager=$this->cityManager->find($id);
        $oldAvatarPath=$cityManager->avatar_path;
        File::delete(public_path( Storage::url($oldAvatarPath)));
        $cityManager->update(['avatar_path'=>$path]);

    }
}
