<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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

        view()->composer('*', function($view){
            $view->with('site_settings', json_decode(getAllSiteSettings()));
        });

        view()->composer('admin.layouts.partials.sidebarLeft', function($view){
            $view->with('user', \App\User::getUser());
        });

        //new validtion
        Validator::extend('uniqueUssdRegistration', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('ussd_registrations')->where('phone', $value)
                                        ->where('ussd_event_id', $parameters[0])
                                        ->count();
            return $count === 0;
        });

        //recaptcha validation
        Validator::extend(
          'recaptcha',
          'App\\Validators\\Recaptcha@validate'
        );

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
