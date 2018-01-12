<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'image' => 'App\Entities\Image'
        ]);

        view()->composer('site.layouts.partials.sidebarLeft', function($view){
            $view->with('user', \App\User::getUser());
        });

        /*view()->composer('site.layouts.partials.footer', function($view){
            $view->with('site_settings', json_decode(getAllSiteSettings()));
        });*/

        view()->composer('*', function($view){
            $view->with('site_settings', json_decode(getAllSiteSettings()));
        });

        

        /*view()->composer('layouts.partials.footer', function($view){
            $view->with('site_settings', \App\Entities\SiteSetting::getSiteSettings());
        });*/

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
