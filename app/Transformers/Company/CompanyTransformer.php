<?php

namespace App\Transformers\Company;

use App\Entities\Company;
use App\Entities\CompanyJoinRequest;
use App\Transformers\Image\ImageTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class CompanyTransformer
 * @package App\Transformers
 */
class CompanyTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $defaultIncludes = ['images'];

    /**
     * @param Company $model
     * @return array
     */
    public function transform(Company $model)
    {

        //site url
        $site_url = config('app.url');

        if ($model->deleted_at) { $deleted_at = $model->deleted_at->toIso8601String(); } else { $deleted_at = null; }
        if ($model->created_at) { $created_at = $model->created_at->toIso8601String(); } else { $created_at = null; }
        if ($model->updated_at) { $updated_at = $model->updated_at->toIso8601String(); } else { $updated_at = null; }
        
        //get main image
        if ($model->images()->first()) {
          $main_image = $model->images()->first();
        } else {
          $main_image['thumb_img'] = $site_url . '/' . config('constants.images.no_image_thumb');
          $main_image['full_img'] = $site_url . '/' . config('constants.images.no_image_full');
        }        

        //start get whether user is signed up to this company/ sacco or not
        $user_signed = false;
        if (auth()->user()) {
          $user_id = auth()->user()->id;
          //is user signed up to company?
          $user_signed_company = $model->users()
                                 ->where('company_user.user_id', $user_id)
                                 ->first();
          if ($user_signed_company) {
            $user_signed = true;
          } else {
            $user_signed = false;
          }
        } else {
          $user_signed = false;
        }
        //end get whether user is signed up to this company/ sacco or not

        //start check whether user has created a company jon request
        $user_join_request = false;
        if (auth()->user()) {
          $user_id = auth()->user()->id;
          //has user sent join request to company?
          $user_company_join_request = $model->companyjoinrequests()
                                 ->where('company_join_requests.user_id', $user_id)
                                 ->where('company_join_requests.status_id', '5')
                                 ->first();
          if ($user_company_join_request) {
            $user_join_request = true;
          } else {
            $user_join_request = false;
          }
        } else {
          $user_join_request = false;
        }
        //end check whether user has created a company jon request

        return [

          'id' => (int)$model->id,
          'name' => $model->name,
          'description' => $model->description,
          'physical_address' => $model->physical_address,
          'phone' => $model->phone_number,
          'box' => $model->box,
          'email' => $model->email,
          'ussd_code' => $model->ussd_code,
          'sms_user_name' => $model->sms_user_name,
          'latitude' => $model->latitude,
          'longitude' => $model->longitude,
          'main_image' => $main_image,
          'user_signed' => $user_signed,
          'user_join_request' => $user_join_request,
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

    public function includeImages(Company $model)
    {
        return $this->collection($model->images, new ImageTransformer());
    }

}
