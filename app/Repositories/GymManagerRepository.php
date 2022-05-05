<?php

namespace App\Repositories;

use App\Contracts\ClerkRepositoryInterface;
use App\Models\GymManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GymManagerRepository extends BaseRepository implements ClerkRepositoryInterface
{
    private GymManager $gymManager;
    public function __construct(GymManager $gymManager)
    {
        parent::__construct($gymManager);
        $this->gymManager=$gymManager;
    }
    public function updateavatar($id,$path)
    {
        $gymManager=$this->gymManager->find($id);
        $oldAvatarPath=$gymManager->avatar_path;
        File::delete(public_path( Storage::url($oldAvatarPath)));
        $gymManager->update(['avatar_path'=>$path]);

    }
}
