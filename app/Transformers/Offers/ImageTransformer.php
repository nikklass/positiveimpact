<?php

namespace App\Transformers\Offers;

use App\Entities\Image;
use League\Fractal\TransformerAbstract;

/**
 * Class OfferTransformer.
 */
class ImageTransformer extends TransformerAbstract
{

    /**
     * @param Image $model
     * @return array
     */
    public function transform(Image $model)
    {
        
        //$models = \App\Entities\Offer::hydrate(array($model));
        //get first item in collection
        //$model = $models->first();

        return [
        
            'id' => $model->id,
            'name' => $model->name,
            'club_id' => $model->club_id,
            'description' => $model->description,
            'expiry_date' => $model->expiry_date,
            'start_date' => $model->start_date,
            'end_date' => $model->end_date,
            'offer_day' => $model->offer_day,
            'offer_frequency' => $model->offer_frequency,
            'status' => $model->status()->first(['id', 'name']),
            'offer_type' => $model->offer_type,
            'num_products' => $model->num_products,
            'offer_expiry_method' => $model->offer_expiry_method,
            'num_sales' => $model->num_sales,
            'max_sales' => $model->max_sales,
            'permalink' => $model->permalink,
            'min_age' => $model->min_age,
            'max_age' => $model->max_age,
            'creator' => $model->creator()->first(['id', 'first_name', 'last_name']),
            'updater' => $model->updater()->first(['id', 'first_name', 'last_name']),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at

        ];

    }

    /**
     * @param Offer $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeImages(Offer $model)
    {
        return $this->collection($model->images, new ImageTransformer());
    }

}
