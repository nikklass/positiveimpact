<?php

namespace App\Transformers\Clubs;

use App\Entities\Club;
use League\Fractal\TransformerAbstract;

/**
 * Class ClubTransformer.
 */
class ClubTransformer extends TransformerAbstract
{

    /**
     * @param Club $model
     * @return array
     */
    public function transform(Club $model)
    {

        /*$category = $model->category();
        dd($category);*/
        return [
        
            'id' => $model->id,
            'name' => $model->name,
            'short_desc' => $model->short_desc,
            'description' => $model->description,
            'paybill_no' => $model->paybill_no,
            'contact_person' => $model->contact_person,
            'phone1' => $model->phone1,
            'phone2' => $model->phone2,
            'street_address' => $model->street_address,
            'status' => $model->status()->first(['id', 'name']),
            'category' => $model->category()->first(['id', 'name']),
            'state' => $model->state()->first(['id', 'name']),
            'town' => $model->town,
            'longitude' => $model->longitude,
            'latitude' => $model->latitude,
            'personal_email' => $model->personal_email,
            'email' => $model->email,
            'permalink' => $model->permalink,
            'facebook_url' => $model->facebook_url,
            'instagram_url' => $model->instagram_url,
            'googleplus_url' => $model->googleplus_url,
            'creator' => $model->creator()->first(['id', 'first_name', 'last_name']),
            'updater' => $model->updater()->first(['id', 'first_name', 'last_name']),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at

        ];

    }

}
