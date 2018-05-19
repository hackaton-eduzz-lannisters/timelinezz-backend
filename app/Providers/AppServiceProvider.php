<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ServiceInterfaces\ActionServiceInterface;
use App\Services\ActionService;
use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\Repositories\ActionRepository;
use App\RepositoryInterfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\ServiceInterfaces\TimelineServiceInterface;
use App\Services\TimelineService;
use App\RepositoryInterfaces\HistoryRepositoryInterface;
use App\Repositories\HistoryRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ActionRepositoryInterface::class, ActionRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(HistoryRepositoryInterface::class, HistoryRepository::class);
        
        $this->app->singleton(ActionServiceInterface::class, ActionService::class);
        $this->app->singleton(TimelineServiceInterface::class, TimelineService::class);
    }
}
