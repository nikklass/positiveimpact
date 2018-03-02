<?php

namespace App\Transformers\Image;

use App\Entities\Image;
use League\Fractal\TransformerAbstract;

/**
 * Class ImageTransformer
 * @package App\Transformers
 */
class ImageTransformer extends TransformerAbstract
{

    /**
     * @param Image $model
     * @return array
     */
    public function transform(Image $model)
    {

        

        if ($model->deleted_at) { $deleted_at = $model->deleted_at->toIso8601String(); } else { $deleted_at = null; }
        if ($model->created_at) { $created_at = $model->created_at->toIso8601String(); } else { $created_at = null; }
        if ($model->updated_at) { $updated_at = $model->updated_at->toIso8601String(); } else { $updated_at = null; }

        //site url
        $site_url = config('app.url');

        return [

          'id' => (int)$model->id,
          'caption' => $model->caption,
          'thumb_img' => $site_url . '/' . $model->thumb_img,
          'thumb_img_400' => $site_url . '/' . $model->thumb_img_400,
          'full_img' => $site_url . '/' . $model->full_img,
          'image_section' => $model->image_section,
          'imagetable_id' => $model->imagetable_id,
          'imagetable_type' => $model->imagetable_type,
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


}
