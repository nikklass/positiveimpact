<?php

namespace App\Http\Controllers\Web;

use App\Entities\Offer;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;

class HomeController extends Controller
{

    /**
     * Show home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*start cache settings*/
        $url = request()->url();
        $params = request()->query();
        $fullUrl = getFullCacheUrl($url, $params);
        $minutes = getCacheDuration(); 
        /*end cache settings*/

        $restaurant_data = [];
        $club_data = [];
        $event_data = [];
                
        //get offers
        /*$limit = 8;

        $restaurant_data = getOffers(3, $limit);
        $club_data = getOffers(2, $limit);
        $event_data = getOffers('', $limit, 'event');*/

        //dd($club_data);

        //return cached data or cache if cached data not exists
        /*return Cache::remember($fullUrl, $minutes, function () use ($restaurant_data, $club_data, $event_data) {
            return view('site.index', compact('restaurant_data', 'club_data', 'event_data'));
        });*/

        return view('site.index');

    }

    public function about()
    {
        return view('site.about');
    }

    public function programs()
    {
        return view('site.programs');
    }

    public function videos()
    {
        return view('site.videos');
    }

    public function blog()
    {
        return view('site.blog');
    }

    public function contacts()
    {
        return view('site.contacts');
    }
    

}
