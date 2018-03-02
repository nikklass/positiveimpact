<?php

namespace App\Transformers\Company;

use App\Entities\CompanyJoinRequest;
use App\Transformers\Company\CompanyTransformer;
use App\Transformers\Users\UserTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class CompanyJoinRequestTransformer
 * @package App\Transformers
 */
class CompanyJoinRequestTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $defaultIncludes = ['user', 'company'];

    /**
     * @param CompanyJoinRequest $model
     * @return array
     */
    public function transform(CompanyJoinRequest $model)
    {

        if ($model->deleted_at) { $deleted_at = $model->deleted_at->toIso8601String(); } else { $deleted_at = null; }
        if ($model->created_at) { $created_at = $model->created_at->toIso8601String(); } else { $created_at = null; }
        if ($model->updated_at) { $updated_at = $model->updated_at->toIso8601String(); } else { $updated_at = null; }       
        
        return [

          'company_id' => (int)$model->company_id,
          'user_id' => (int)$model->user_id,
          'comments' => $model->comments,
          'status_id' => $model->status_id,
          'status' => $model->status()->first(['name']),
          'creator_id' => $model->created_by,
          'updater_id' => $model->updated_by,
          'deleter_id' => $model->deleted_by,
          'creator' => $model->creator()->first(['id', 'first_name', 'last_name']),
          'updater' => $model->updater()->first(['id', 'first_name', 'last_name']),
          'deleter' => $model->deleter()->first(['id', 'first_name', 'last_name']),
          'created_at' => $created_at,
          'updated_at' => $updated_at,
          'deleted_at' => $deleted_at

        ];
    }

    public function includeUser(CompanyJoinRequest $model)
    {
        return $this->item($model->user, new UserTransformer());
    }

    public function includeCompany(CompanyJoinRequest $model)
    {
        return $this->item($model->company, new CompanyTransformer());
    }

}
