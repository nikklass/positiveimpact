<?php

namespace App\Http\Controllers\Api\Offers;

use App\Entities\Offer;
use App\Transformers\Offers\OfferTransformer;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Http\Response\paginator;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\paginate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Propaganistas\LaravelPhone\PhoneNumber;
use libphonenumber\PhoneNumberFormat;

/**
 * Class OffersController.
 *
*/
class OffersController extends Controller
{
    
    use Helpers;

    /**
     * @var Offer
    */
    protected $model;

    /**
     *  constructor.
     *
     * @param Offer $model
    */
    public function __construct(Offer $model)
    {
        $this->model = $model;

        /*$this->middleware('permission:Create offers')->only('store');
        $this->middleware('permission:Update offers')->only('update');
        $this->middleware('permission:Delete offers')->only('destroy');*/
    }

    /**
     *
     * @param Request $request
     * @return mixed
    */
    public function index(Request $request)
    {

        /*start cache settings*/
        $url = request()->url();
        $params = request()->query();
        $fullUrl = getFullCacheUrl($url, $params);
        $minutes = getCacheDuration('low'); 
        /*end cache settings*/

        //get params
        $report = $request->report;
        $category_id = $request->category_id;
        $status_id = $request->status_id;
        $club_id = $request->club_id;
        $offer_type = $request->offer_type;
        $order_by = $request->order_by;
        $order_style = $request->order_style;

        //order style - either 'desc' or 'asc'
        if (!$order_style) { $order_style = "asc"; }
        if (!$order_by) { $order_by = "name"; }
        if (!$offer_type) { $offer_type = "regular"; }
                
        //create data object
        $data = DB::table('offers')->select('offers.*');

        //if category_id, join to categories table through clubs table
        if ($category_id) { 
            $data = $data->join('clubs','clubs.id','=','offers.club_id')
                         ->join('categories','clubs.category_id','=','categories.id')
                         ->where('categories.id', $category_id);
        }

        //do we have a  status_id to check?
        if ($status_id) { 
            $data = $data->where('offers.status_id', $status_id);
        }

        if ($offer_type) { 
            $data = $data->where('offers.offer_type', $offer_type);
        }

        if ($club_id) { 
            $data = $data->where('offers.club_id', $club_id);
        }

        //arrange by column
        $data = $data->orderBy($order_by, $order_style);

        //are we in report mode?
        if (!$report) {

            $limit = $request->get('limit', config('app.pagination_limit'));
            $data = $data->paginate($limit);

            //add query params
            if ($request->has('offer_type')) {
                $data->appends('offer_type', $request->get('offer_type'));
            }
            if ($request->has('limit')) {
                $data->appends('limit', $request->get('limit'));
            }
            if ($request->has('order_by')) {
                $data->appends('order_by', $request->get('order_by'));
            }
            if ($request->has('order_style')) {
                $data->appends('order_style', $request->get('order_style'));
            }
            if ($request->has('category_id')) {
                $data->appends('category_id', $request->get('category_id'));
            }
            if ($request->has('club_id')) {
                $data->appends('club_id', $request->get('club_id'));
            }
            if ($request->has('status_id')) {
                $data->appends('status_id', $request->get('status_id'));
            }
            //end query params

            $data = $this->response->paginator($data, new OfferTransformer());

        } else {

            $data = $data->get();
            $data = $this->response->collection($data, new OfferTransformer());

        }

        //return cached data or cache if cached data not exists
        return Cache::remember($fullUrl, $minutes, function () use ($data) {
            return view('site.index', compact('data'));
        });


    }

    /**
     * @param $id
     * @return mixed
    */
    public function show($id)
    {
        $club = $this->model->findOrFail($id);

        return $this->response->item($club, new OfferTransformer());
    }

    /**
     * @param Request $request
     * @return mixed
    */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|unique:offers',
            'club_id' => 'required',
            'offer_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];

        $payload = app('request')->only('name', 'club_id', 'offer_type', 'start_date', 'end_date');

        $validator = app('validator')->make($payload, $rules);

        if ($validator->fails()) {
            $error_messages = formatValidationErrors($validator->errors());
            throw new StoreResourceFailedException($error_messages);
        }

        //create item
        $offer = $this->model->create($request->all());

        return ['message' => 'Offer created.'];

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
    */
    public function update(Request $request, $id)
    {
        $user = $this->model->findOrFail($id);
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ];
        if ($request->method() == 'PATCH') {
            $rules = [
                'name' => 'sometimes|required',
                'email' => 'sometimes|required|email|unique:users,email,'.$user->id,
            ];
        }
        $this->validate($request, $rules);
        // Except password as we don't want to let the users change a password from this endpoint
        $user->update($request->except('_token', 'password'));
        if ($request->has('roles')) {
            $user->syncRoles($request['roles']);
        }

        return $this->response->item($user->fresh(), new OfferTransformer());
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
    */
    public function destroy(Request $request, $id)
    {
        $item = $this->model->findOrFail($id);
        $item->delete();

        return $this->response->noContent();
    }

}
