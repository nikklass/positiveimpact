<?php

namespace App\Http\Controllers\Api\Users;

use App\Permission;
use App\Http\Controllers\BaseController;
use App\Transformers\Users\PermissionTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

/**
 * Class ApiPermissionsController
 * @package App\Http\Controllers\Api\Users
 */
class ApiPermissionsController extends BaseController
{

    /**
     * @var
     */
    protected $model;

    /**
     * PermissionsController constructor.
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
        $this->middleware('permission:List permissions')->only('index');
    }


    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function index(Request $request)
    {
        return $this->response->paginator($this->model->paginate($request->get('limit', config('app.pagination_limit'))), new PermissionTransformer());
    }
}
