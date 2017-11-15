<?php

namespace App\Transformers\Ussd;

use App\Company;
use App\UssdRegistration;
use League\Fractal\TransformerAbstract;

/**
 * Class UssdRegistrationTransformer
 * @package App\Transformers
 */
class UssdRegistrationTransformer extends TransformerAbstract
{

    /**
     * @param MpesaIncoming $model
     * @return array
     */
    public function transform(UssdRegistration $model)
    {
        
        $company = $this->getCompany($model->company_id);
        if ($company) { 
          $company_id = $company->id;
          $company_name = $company->name; 
        } else { 
          $company_id = null; 
          $company_name = null; 
        }

        return [

          'id' => (int)$model->id,
          'name' => $model->name,
          'phone' => $model->mobile,
          'alternate_mobile' => $model->alternate_mobile,
          'tsc_no' => $model->tsc_no,
          'email' => $model->email,
          'county' => $model->county,
          'sub_county' => $model->sub_county,
          'workplace' => $model->workplace,
          'ict_level' => $model->ict_level,
          'subjects' => $model->subjects,
          'lipanampesacode' => $model->lipanampesacode,
          'registered' => $model->registered,
          'created_at' => $model->created_at,
          'company_id' => $model->company_id,
          'company_name' => $model->company_name

        ];
    }

    public function getCompany($company_id)
    {
        if ($company_id) {
            return Company::find($company_id);
        } else {
            return null;
        }
    }

}
