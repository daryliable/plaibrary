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
       if(env('APP_ENV')!=='local'){
            URL::forceScheme('https');
       }
       if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }

        Schema::defaultstringLength(191);
        $charts->register([
            \App\Charts\UserStatChart::class
        ]);
    }
}
