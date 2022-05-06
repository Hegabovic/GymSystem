<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
