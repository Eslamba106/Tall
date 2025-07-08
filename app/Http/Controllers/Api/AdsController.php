<?php

namespace App\Http\Controllers\Api;

use App\Services\AdsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public $ads;
    public $model;
    public function __construct(AdsService $ads)
    {
        $this->ads = $ads;
        // $this->middleware(['tenant.db', 'auth:sanctum']);

    }

    public function store(Request $request)
    {

        $main_ads = $this->ads->store_ads($request);
        return response()->apiSuccess('Ads added successfully', $main_ads);
    }
    public function list(Request $request)
    { 
                // return("user" .auth('sanctum')->check());

        $list = $this->ads->get_ads_list();
        return response()->apiSuccess('Ads List ', $list);
    }
}
