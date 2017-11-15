<?php

namespace App\Http\Controllers\Api\Users;

use App\Role;
use App\Http\Controllers\BaseController;
use App\Transformers\Users\RoleTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

/**
 * Class ApiRolesController
 * @package App\Http\Controllers\Api\Users
 */
class ApiRolesController extends BaseController
{

    /**
     * @var
     */
    protected $model;


    /**
     * RolesController constructor.
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
        $this->middleware('permission:List roles')->only('index');
        $this->middleware('permission:List roles')->only('show');
        $this->middleware('permission:Create roles')->only('store');
        $this->middleware('permission:Update roles')->only('update');
        $this->middleware('permission:Delete roles')->only('destroy');
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $paginator = $this->model->with('permissions')
            ->paginate($request->get('limit', config('app.pagination_limit')));
        return $this->response->paginator($paginator, new RoleTransformer());
    }


    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $role = $this->model->with('permissions')->byUuid($id)->firstOrFail();
        return $this->response->item($role, new RoleTransformer());
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $role = $this->model->create($request->all());
        if ($request->has('permissions')) {
            $role->syncPermissions($request['permissions']);
        }
        return $this->response->created(url('api/roles/'.$role->uuid));
    }


    /**
     * @param Request $request
     * @param $uuid
     * @return mixed
     */
    public function update(Request $request, $uuid)
    {
        $role = $this->model->byUuid($uuid)->firstOrFail();
        $this->validate($request, [
            'name' => 'required'
        ]);
        $role->update($request->except('_token'));
        if ($request->has('permissions')) {
            $role->syncPermissions($request['permissions']);
        }
        return $this->response->item($role->fresh(), new RoleTransformer());
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return mixed
     */
    public function destroy(Request $request, $uuid)
    {
        $role = $this->model->byUuid($uuid)->firstOrFail();
        $role->delete();
        return $this->response->noContent();
    }
}
