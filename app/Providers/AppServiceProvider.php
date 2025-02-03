<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // hilangkan tanda comment
        // $this->app->usePublicPath(realpath(base_path().'/../public_html'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // hilangkan tanda comment
        // URL::forceScheme('https');
    }
}
