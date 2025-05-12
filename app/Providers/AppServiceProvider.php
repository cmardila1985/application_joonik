<?php

namespace App\Providers;

use App\Contracts\LocationProviderInterface;
use App\Contracts\UserProviderInterface;
use App\Services\LocationService;
use App\Services\UserService;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LocationProviderInterface::class, LocationService::class);
        $this->app->bind(UserProviderInterface::class, UserService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
