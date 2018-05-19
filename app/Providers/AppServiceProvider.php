<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ServiceInterfaces\ActionServiceInterface;
use App\Services\ActionService;
use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\Repositories\ActionRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ActionRepositoryInterface::class, ActionRepository::class);
        
        $this->app->singleton(ActionServiceInterface::class, ActionService::class);
    }
}
