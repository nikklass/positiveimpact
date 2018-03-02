<?php

namespace App\Http\Controllers;

use App\Entities\Company;
use App\Entities\CompanyJoinRequest;
use App\Entities\Group;
use App\Entities\SmsOutbox;
use App\Role;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class HomeController extends Controller
{

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = auth()->user();
        $smsoutboxes = [];

        //if user is superadmin, show all companies, else show a user's companies
        $companies = [];
        if ($user->hasRole('superadministrator')){
            $companies = Company::all()->pluck('id');
        } else {
            if ($user->company) {
                $companies[] = $user->company->id;
            }
        }
        //dd($user);

        //get company users/ groups
        $users = [];
        //$groups = [];

        if ($companies) {

            /*$groups = Group::whereIn('company_id', $companies)
                     ->orderBy('id', 'desc')
                     ->with('company')
                     ->with('users')
                     ->paginate(10);*/
        
            $users = User::whereIn('company_id', $companies)
                    ->orderBy('id', 'desc')
                    ->with('company')
                    ->with('groups')
                    ->paginate(5);

            $companyJoinRequests = CompanyJoinRequest::whereIn('company_id', $companies)
                    ->orderBy('id', 'desc')
                    ->with('company')
                    ->with('user')
                    ->paginate(5);

            $smsoutboxes = SmsOutbox::whereIn('company_id', $companies)
                    ->orderBy('id', 'desc')
                    ->get();
                    //->paginate(10);

            $groups_all = Group::whereIn('company_id', $companies)
                     ->orderBy('id', 'desc')
                     ->get();

            //sms outbox count
            $count_smsoutbox = count($smsoutboxes);
            $user->sms_outbox_count = $count_smsoutbox;
            
            //groups count
            $count_groups = count($groups_all);
            $user->count_groups = $count_groups;

        }

        //dd($user, $smsoutboxes);
        
        return view('home', compact('smsoutboxes'))
            ->withUser($user)
            ->withUsers($users)
            ->withCompanyJoinRequests($companyJoinRequests)
            ->withSmsOutboxes($smsoutboxes);

    }

}
