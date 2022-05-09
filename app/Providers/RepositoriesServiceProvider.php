<?php

namespace App\Providers;

use App\Contracts\AttendanceRepositoryInterface;
use App\Contracts\BaseRepositoryInterface;
use App\Contracts\CityRepositoryInterface;
use App\Contracts\CoachRepositoryInterface;
use App\Contracts\GymRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Contracts\PackageRepositoryInterface;
use App\Contracts\PlanRepositoryInterface;
use App\Contracts\SessionsCoachesRepositoryInterface;
use App\Contracts\TrainingSessionInterface;
use App\Contracts\TrainingSessionsRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\AttendanceRepository;
use App\Repositories\BaseRepository;
use App\Repositories\CityManagerRepository;
use App\Repositories\CityRepository;
use App\Repositories\CoachRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\GymRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PackageRepository;
use App\Repositories\PlanRepository;
use App\Repositories\SessionsCoachesRepository;
use App\Repositories\TrainingSessionsRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(TrainingSessionsRepositoryInterface::class, TrainingSessionsRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, CityManagerRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, GymManagerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, GymManagerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, CityManagerRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(planRepositoryInterface::class, PlanRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SessionsCoachesRepositoryInterface::class, SessionsCoachesRepository::class);
        $this->app->bind(GymRepositoryInterface::class, GymRepository::class);

    }
}
