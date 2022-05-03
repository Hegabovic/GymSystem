<?php

namespace App\Providers;

use App\Contracts\BaseRepositoryInterface;
use App\Contracts\CityRepositoryInterface;
use App\Contracts\CoachRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\CityManagerRepository;
use App\Repositories\CityRepository;
use App\Repositories\CoachRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\UserRepository;
use App\Repositories\OrderRepository;
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
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(BaseRepositoryInterface::class,UserRepository::class);
        $this->app->bind(BaseRepositoryInterface::class,CityManagerRepository::class);
        $this->app->bind(BaseRepositoryInterface::class,GymManagerRepository::class);
    }
}
