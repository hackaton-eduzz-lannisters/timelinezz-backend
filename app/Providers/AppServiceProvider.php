<?php

namespace App\Providers;

use App\Repositories\ActionRepository;
use App\Repositories\ApplicationRepository;
use App\Repositories\HistoryRepository;
use App\Repositories\UserRepository;
use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\RepositoryInterfaces\ApplicationRepositoryInterface;
use App\RepositoryInterfaces\UserRepositoryInterface;
use App\ServiceInterfaces\ActionServiceInterface;
use App\ServiceInterfaces\ApplicationServiceInterface;
use App\ServiceInterfaces\TimelineServiceInterface;
use App\Services\ActionService;
use App\Services\ApplicationService;
use App\Services\TimelineService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\RepositoryInterfaces\HistoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ActionRepositoryInterface::class, ActionRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(HistoryRepositoryInterface::class, HistoryRepository::class);
        $this->app->singleton(ApplicationRepositoryInterface::class, ApplicationRepository::class);
        
        $this->app->singleton(ActionServiceInterface::class, ActionService::class);
        $this->app->singleton(TimelineServiceInterface::class, TimelineService::class);
        $this->app->singleton(ApplicationServiceInterface::class, ApplicationService::class);
    }
    
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    
}
