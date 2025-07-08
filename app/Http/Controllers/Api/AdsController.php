<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\District;
use App\Models\EstateProductTransaction;
use App\Models\EstateProductType;
use App\Services\AdsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EstateProduct;

class AdsController extends Controller
{
    public $ads;
    public $model;
    public function __construct(AdsService $ads)
    {
        $this->ads = $ads; 

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
    public function delete($id)
    {
        $ads = $this->ads->delete_ads($id);
        if (!$ads) {
            return response()->apiFail('Ads not found', 404);
        }
        return response()->apiSuccess('Ads deleted successfully', $ads);
    }
    public function updateStatus($id)
    {
        $ads = $this->ads->update_ads_status($id);
        if (!$ads) {
            return response()->apiFail('Ads not found', 404);
        }
        return response()->apiSuccess('Ads status updated successfully', $ads);
    }

    public function get_models($id)
    {
        $models = CarModel::where('car_type_id', $id)->get(['id', 'name']);
        return response()->json([
            'success' => true,
            'models' => $models,
        ]);
    }

    public function get_districts($id)
    {
        $districts = District::where('city_id', $id)->get(['id', 'name']);
        return response()->apiSuccess([
            'districts' => $districts,
        ]);
    }
    public function get_cities()
    {
        $cities = City::get(['id', 'name']);
        return response()->apiSuccess([
            'cities' => $cities,
        ]);
    }
    public function get_cars()
    {
        $car_types = CarType::latest()->select('id', 'name')->get();
        return response()->apiSuccess([
            'car_types' => $car_types,
        ]);
    }
    public function get_estate_product()
    {
        $estate_product = EstateProduct::latest()->select('id', 'name')->get();
        return response()->apiSuccess([
            'estate_product' => $estate_product,
        ]);
    }
    public function get_estate_product_type($id)
    {
        $estate_product_types = EstateProductType::where('estate_product_id', $id)->get(['id', 'name']);
        return response()->apiSuccess([
            'estate_product_types' => $estate_product_types,
        ]);
    }
    public function get_estate_product_transaction($id)
    {
        $estate_product_transactions = EstateProductTransaction::where('product_type_id', $id)->get(['id', 'name']);
        return response()->apiSuccess([
            'estate_product_transactions' => $estate_product_transactions,
        ]);
    }
}
