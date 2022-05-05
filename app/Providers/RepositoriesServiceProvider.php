<?php

namespace App\Providers;

use App\Contracts\BaseRepositoryInterface;
use App\Contracts\CoachRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Contracts\PackageRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\CoachRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PackageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CoachRepositoryInterface::class, CoachRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
    }
}
