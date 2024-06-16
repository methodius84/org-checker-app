<?php

namespace App\Providers;

use App\Services\OrganizationCheckers\CheckerServiceInterface;
use App\Services\OrganizationCheckers\Checko\CheckoService;
use Illuminate\Support\ServiceProvider;

class OrganizationCheckerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CheckerServiceInterface::class, CheckoService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
