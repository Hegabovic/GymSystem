<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CustomerRepository extends BaseRepository implements UserRepositoryInterface
{
    private Customer $customer;
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
        $this->customer=$customer;

    }
    public function updateAvatar($id,$path)
    {
        $customer=$this->customer->find($id);
        $oldAvatarPath=$customer->avatar_path;
        File::delete(public_path( Storage::url($oldAvatarPath)));
        $customer->update(['avatar_path'=>$path]);

    }
}
