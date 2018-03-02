<?php

namespace App\Transformers\Users;

use App\Entities\City;
use App\Entities\Country;
use App\Entities\State;
use App\Transformers\Company\CompanyTransformer;
use App\Transformers\Image\ImageTransformer;
use App\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $defaultIncludes = ['roles', 'companies', 'images'];

    /**
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        
        if ($model->gender =='m') { $gender='Male'; } else { $gender='Female'; }

        $country = $this->getCountry($model->phone_country);
        if ($country) { $country_name = $country->name; } else { $country_name = null; }

        $state = $this->getState($model->state_id);
        if ($state) { $state_name = $state->name; } else { $state_name = null; }

        $city = $this->getCity($model->city_id);
        if ($city) { $city_name = $city->name; } else { $city_name = null; }

        if ($model->dob) { $dob = $model->dob->toIso8601String(); } else { $dob = null; }
        if ($model->deleted_at) { $deleted_at = $model->deleted_at->toIso8601String(); } else { $deleted_at = null; }
        if ($model->created_at) { $created_at = $model->created_at->toIso8601String(); } else { $created_at = null; }
        if ($model->updated_at) { $updated_at = $model->updated_at->toIso8601String(); } else { $updated_at = null; }

        return [
            
            'id' => $model->uuid,
            'user_id' => $model->id,
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'email' => $model->email,
            'phone_country' => $model->phone_country,
            'phone_country_name' => $country_name,
            'active' => $model->active,
            'status_id' => $model->status_id,
            'status' => $model->status()->first(['name']),
            'phone' => $model->phone,
            'state_id' => $model->state_id,
            'state' => $state_name,
            'city_id' => $model->city_id,
            'city' => $city_name,
            'gender' => $model->gender,
            'gender_name' => $gender,
            'dob' => $dob,
            'dob_updated' => $model->dob_updated,
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

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRoles(User $model)
    {
        return $this->collection($model->roles, new RoleTransformer());
    }

    public function includeCompanies(User $model)
    {
        return $this->collection($model->companies, new CompanyTransformer());
    }

    public function includeImages(User $model)
    {
        return $this->collection($model->images, new ImageTransformer());
    }

    /**
     * @param get Country
     */
    public function getCountry($sortname)
    {
        if ($sortname) {
            return Country::where('sortname', $sortname)->first();
        } else {
            return null;
        }
    }

    public function getState($state_id)
    {
        if ($state_id) {
            return State::find($state_id);
        } else {
            return null;
        }
    }

    public function getCity($city_id)
    {
        if ($city_id) {
            return City::find($city_id);
        } else {
            return null;
        }
    }

}
