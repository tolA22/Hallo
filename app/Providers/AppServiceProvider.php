<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Billing\BillingRepository; 
use App\Repository\Billing\BillingRepositoryInterface; 
use App\Repository\Log\LogRepository; 
use App\Repository\Log\LogRepositoryInterface; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);
        $this->app->bind(BillingRepositoryInterface::class, BillingRepository::class);
    }
}
