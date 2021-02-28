<?php

namespace App\Providers;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use ConsoleTVs\Charts\Registrar as Charts;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     if (env('REDIRECT_HTTPS')) {
        $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
    
         
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts, UrlGenerator $url)
    {  
        URL::forceScheme('https');
        Schema::defaultstringLength(191);
        
        if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
        
        $charts->register([
            \App\Charts\UserStatChart::class
        ]);
    }
}
