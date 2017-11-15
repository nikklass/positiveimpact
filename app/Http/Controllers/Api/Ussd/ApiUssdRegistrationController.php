<?php

namespace App\Http\Controllers\Api\Ussd;

use App\Entities\Company;
use App\Entities\Group;
use App\User;
use App\Entities\UssdRegistration;
use App\Http\Controllers\BaseController;
use App\Transformers\Ussd\UssdRegistrationTransformer;
use Carbon\Carbon;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Routing\Helpers;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Session;

class ApiUssdRegistrationController extends BaseController
{
    
    /**
     * @var ChatChannel
     */
    protected $model;

    /**
     * Controller constructor.
     *
     * @param UssdRegistration $model
     */
    public function __construct(UssdRegistration $model)
    {
        $this->model = $model;
        //$this->middleware('permission:Update chatchannels')->only('update');
        //$this->middleware('permission:Delete chatchannels')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        /*start cache settings*/
        $url = request()->url();
        $params = request()->query();

        $fullUrl = getFullCacheUrl($url, $params);
        $minutes = getCacheDuration('low'); 
        /*end cache settings*/

        //get logged in user
        $user = auth()->user();
        
        //get data
        if ($user->hasRole('superadministrator')){

            //get data
            $ussdregistrations = new UssdRegistration();

        } else if ($user->hasRole('administrator')){
            
            //get user company 
            $user_company_id = $user->company->id;

            //get paybills accounts for showing in dropdown
            $ussdregistrations = UssdRegistration::where('company_id', $user_company_id);

        }

        //filter request
        $id = $request->id;
        $report = $request->report;
        $phone_number = $request->phone_number;
        $account_name = $request->account_name;
        $start_date = $request->start_date;
        $lipanampesa_code = $request->lipanampesa_code;
        if ($start_date) { $start_date = Carbon::parse($request->start_date); }
        $end_date = $request->end_date;
        if ($end_date) { $end_date = Carbon::parse($request->end_date); }
        
        //filter results
        if ($id) { 
            $ussdregistrations = $ussdregistrations->where('id', $id); 
        }
        if ($phone_number) { 
            //format the phone number
            $phone_number = formatPhoneNumber($phone_number);
            $ussdregistrations = $ussdregistrations->where('phone', $phone_number); 
        }
        if ($lipanampesa_code) { 
            $ussdregistrations = $ussdregistrations->whereIn('lipanampesacode', $lipanampesa_code); 
        }
        if ($account_name) { 
            $ussdregistrations = $ussdregistrations->where('name', $account_name); 
        }
        if ($start_date) { 
            $ussdregistrations = $ussdregistrations->where('created_at', '>=', $start_date); 
        }
        if ($end_date) { 
            $ussdregistrations = $ussdregistrations->where('created_at', '<=', $end_date); 
        }

        $ussdregistrations = $ussdregistrations->orderBy('created_at', 'desc');

        if (!$report) {
            
            $ussdregistrations = $ussdregistrations->paginate($request->get('limit', config('app.pagination_limit')));
            $data = $this->response->paginator($ussdregistrations, new UssdRegistrationTransformer());

        } else {
        
            $ussdregistrations = $ussdregistrations->get();
            $data = $this->response->collection($ussdregistrations, new UssdRegistrationTransformer());

        }
        //end filter request

        //return cached data or cache if cached data not exists
        return Cache::remember($fullUrl, $minutes, function () use ($data) {
            return $data;
        });

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //$user_id = auth()->user()->id;
        $user_id = 2;

        request()->merge(array(
                    'user_id' => $user_id,
                    'updated_by' => $user_id,
                    'phone_country' => 'KE'
                ));
        //dd($request);

        $rules = [
            'name' => 'required',
            'phone' => 'required|phone:mobile',
            'phone_country' => 'required_with:phone',
            'tsc_no' => 'required'
        ];

        $payload = app('request')->only('name', 'phone', 'phone_country', 'tsc_no');

        $validator = app('validator')->make($payload, $rules);

        if ($validator->fails()) {
            $error_messages = formatValidationErrors($validator->errors());
            throw new StoreResourceFailedException($error_messages);
        }

        //create item
        $ussd_registration = $this->model->create($request->all());

        return ['message' => 'USSD registration created'];

    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {

        /*start cache settings*/
        $url = request()->url();
        $params = request()->query();

        $fullUrl = getFullCacheUrl($url, $params);
        $minutes = getCacheDuration(); 
        /*end cache settings*/

        $ussdregistration = $this->model->findOrFail($id);

        $data = $this->response->item($ussdregistration, new UssdRegistrationTransformer());

        //return cached data or cache if cached data not exists
        return Cache::remember($fullUrl, $minutes, function () use ($data) {
            return $data;
        });

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $ussd_registration = $this->model->findOrFail($id);
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'tsc_no' => 'required'
        ];
        if ($request->method() == 'PATCH') {
            $rules = [
                'name' => 'sometimes|required',
                'phone' => 'sometimes|required',
                'tsc_no' => 'sometimes|required'
            ];
        }

        $payload = app('request')->only('name', 'phone', 'tsc_no');

        $validator = app('validator')->make($payload, $rules);

        if ($validator->fails()) {
            $error_messages = formatValidationErrors($validator->errors());
            throw new StoreResourceFailedException($error_messages);
        }

        $ussd_registration->update($request->except('created_at'));

        return $this->response->item($ussd_registration->fresh(), new UssdRegistrationTransformer());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

}
