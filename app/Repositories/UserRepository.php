<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private User $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function updateAvatar($id, $path)
    {
        $user = $this->user->find($id);
        $oldAvatarPath = $user->avatar_path;
        File::delete(public_path(Storage::url($oldAvatarPath)));
        $user->update(['avatar_path' => $path]);
    }

}
