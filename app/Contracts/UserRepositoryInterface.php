<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function updateAvatar($id, $path);
}
