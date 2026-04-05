<?php

namespace App\Providers;

use App\Services\Implementations\AdminAuthService;
use App\Services\Implementations\ApplyService;
use App\Services\Implementations\NewsLetterService;
use App\Services\Interfaces\AdminAuthInterface;
use App\Services\Interfaces\ApplyInterface;
use App\Services\Interfaces\NewsLetterInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NewsLetterInterface::class, NewsLetterService::class);
        $this->app->bind(AdminAuthInterface::class, AdminAuthService::class);
        $this->app->bind(ApplyInterface::class, ApplyService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
