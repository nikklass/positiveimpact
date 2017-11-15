<?php

namespace App\Http\Controllers\Api\Clubs;

use App\Entities\Club;
use App\Http\Controllers\Controller;
use App\Transformers\Clubs\ClubTransformer;
use Carbon\Carbon;
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
 * Class ClubsController.
 *
 */
class ClubsController extends Controller
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
    public function __construct(Club $model)
    {
        $this->model = $model;

        $this->middleware('permission:Create clubs')->only('store');
        $this->middleware('permission:Update clubs')->only('update');
        $this->middleware('permission:Delete clubs')->only('destroy');
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
        $order_by = $request->order_by;
        $order_style = $request->order_style;

        //order style - either 'desc' or 'asc'
        if (!$order_style) { $order_style = "asc"; }
        if (!$order_by) { $order_by = "name"; }
                
        //create data object
        $data = $this->model->where('category_id', '!=', '1');

        //if category_id, join to categories table through clubs table
        if ($category_id) { 
            $data = $data->where('category_id', $category_id);
        }

        //do we havea  status_id to check?
        if ($status_id) { 
            $data = $data->where('status_id', $status_id);
        }

        //arrange by column
        $data = $data->orderBy($order_by, $order_style);

        //are we in report mode?
        if (!$report) {

            $limit = $request->get('limit', config('app.pagination_limit'));
            $data = $data->paginate($limit);
            //add query params
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
            if ($request->has('status_id')) {
                $data->appends('status_id', $request->get('status_id'));
            }
            //end query params
            $data = $this->response->paginator($data, new ClubTransformer());

        } else {

            $data = $data->get();
            $data = $this->response->collection($data, new ClubTransformer());

        }

        //return cached data or cache if cached data not exists
        return Cache::remember($fullUrl, $minutes, function () use ($data) {
            return $data;
        });


    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $club = $this->model->findOrFail($id);

        return $this->response->item($club, new ClubTransformer());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {

    }

    /**
     * @param Request $request
     * @param $uuid
     * @return mixed
     */
    public function update(Request $request, $uuid)
    {
        $user = $this->model->byUuid($uuid)->firstOrFail();
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

        return $this->response->item($user->fresh(), new UserTransformer());
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return mixed
     */
    public function destroy(Request $request, $uuid)
    {
        $user = $this->model->byUuid($uuid)->firstOrFail();
        $user->delete();

        return $this->response->noContent();
    }
}
