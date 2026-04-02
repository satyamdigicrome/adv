<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        try {
            View::share('siteSettings', Setting::singleton());
            View::share('tiedUpCompanies', \App\Models\TiedUpCompany::active()->ordered()->get());
        } catch (\Exception $e) {
            // For fresh install before migrations / settings table exists.
        }
    }
}
