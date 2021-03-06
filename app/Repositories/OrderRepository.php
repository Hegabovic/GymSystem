<?php

namespace App\Repositories;

use App\Contracts\CoachRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Models\Coach;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
}
