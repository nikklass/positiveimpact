<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class FooterComposer
{
    
    public $site_settings = [];
    /**
     * Create a footer composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->site_settings = getAllSiteSettings();
        //dd($this->site_settings);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('site_settings', getAllSiteSettings());
    }

}