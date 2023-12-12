<?php

namespace App\Providers;

use App\Services\RegencyService;
use App\Services\Implementation\RegencyServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RegencyProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        RegencyService::class => RegencyServiceImpl::class
    ];

    public function provides()
    {
        return [RegencyService::class];
    }
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
