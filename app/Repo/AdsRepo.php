<?php

namespace App\Repo;

use App\Models\Ads;
use App\Http\Helpers\ImageManager;


class AdsRepo  extends AbstractRepo
{
    public function __construct()
    {
        parent::__construct(Ads::class);
    }

    public function delete_ads($id)
    {
        $ads = Ads::find($id);

        if ($ads) {
            foreach (json_decode($ads['images'], true) as $image) {
                ImageManager::delete('/ads/' . $image);
            }
            ImageManager::delete('/ads/thumbnail/' . $ads['thumbnail']);
            $ads->delete();
            return true;
        }
        return false;
    }
    public function update_ads_status($id)
    {
        $ads = Ads::find($id);
        if ($ads) {
            $ads->status = ($ads->status == 'active') ? 'inactive' : 'active';
            $ads->save();
            return $ads;
        }
        return false;
    }
}
