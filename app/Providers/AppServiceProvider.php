<?php

namespace App\Providers;

use App\Repositories\ActionRepository;
use App\Repositories\ApplicationRepository;
use App\Repositories\HistoryRepository;
use App\Repositories\UserRepository;
use App\Repositories\LinkRepository;
use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\RepositoryInterfaces\ApplicationRepositoryInterface;
use App\RepositoryInterfaces\HistoryRepositoryInterface;
use App\RepositoryInterfaces\UserRepositoryInterface;
use App\RepositoryInterfaces\LinkRepositoryInterface;
use App\ServiceInterfaces\ActionServiceInterface;
use App\ServiceInterfaces\ApplicationServiceInterface;
use App\ServiceInterfaces\TimelineServiceInterface;
use App\ServiceInterfaces\HistoryServiceInterface;
use App\ServiceInterfaces\LinkServiceInterface;
use App\Services\ActionService;
use App\Services\ApplicationService;
use App\Services\TimelineService;
use App\Services\HistoryService;
use App\Services\LinkService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\AuthService;
use App\ServiceInterfaces\AuthServiceInterface;
use App\ServiceInterfaces\UserServiceInterface;
use App\Services\UserService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ActionRepositoryInterface::class, ActionRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(HistoryRepositoryInterface::class, HistoryRepository::class);
        $this->app->singleton(ApplicationRepositoryInterface::class, ApplicationRepository::class);
        $this->app->singleton(LinkRepositoryInterface::class, LinkRepository::class);
        
        $this->app->singleton(ActionServiceInterface::class, ActionService::class);
        $this->app->singleton(TimelineServiceInterface::class, TimelineService::class);
        $this->app->singleton(ApplicationServiceInterface::class, ApplicationService::class);
        $this->app->singleton(LinkServiceInterface::class, LinkService::class);
        $this->app->singleton(HistoryServiceInterface::class, HistoryService::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);
    }
    
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    
}
