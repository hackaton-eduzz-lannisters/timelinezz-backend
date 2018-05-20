<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
use App\ServiceInterfaces\ApplicationServiceInterface;
use App\Services\ApplicationService;
use App\RepositoryInterfaces\ApplicationRepositoryInterface;
use App\Repositories\ApplicationRepository;

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
