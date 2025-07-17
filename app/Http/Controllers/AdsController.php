<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\City;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\District;
use App\Models\EstateType;
use App\Services\AdsService;
use Illuminate\Http\Request;
use App\Models\EstateProduct;
use App\Models\EstateProductType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\EstateProductTransaction;

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
        // dd(DB::getDatabaseName());
        // dd($request->all());
         $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'video_link' => 'nullable|url',
        'estate_product_id' => 'nullable|exists:estate_products,id',
        'estate_type_id' => 'nullable|exists:estate_types,id',
        'estate_transactions_id' => 'nullable|exists:estate_transactions,id',
        'city_id' => 'nullable|exists:cities,id',
        'district_id' => 'nullable|exists:districts,id',
        'car_type_id' => 'nullable|exists:car_types,id',
        'car_model_id' => 'nullable|exists:car_models,id',
        'model_year' => 'nullable|integer'  ,
        'sale_price' => 'nullable|numeric|min:0',
        'rent_price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string|max:5000',
        'car_color' => 'nullable|string|max:100',
        'car_status' => 'nullable|string|max:100',
        'car_motor_status' => 'nullable|string|max:100',
        'oil' => 'nullable|string|max:100',
        'financing' => 'nullable|string|max:100',
        'price_when_call' => 'nullable|boolean',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        'phone' => 'nullable|string|max:20',
//        'method' => 'nullable|string|max:100',
    ]);
        // try {
            $main_ads = $this->ads->store_ads($request);
            return redirect()->route('ads.list')->with('success', __('property_master.added_successfully'));
//         } catch (\Exception $e) {

//             return redirect()->back()->with("error", $e->getMessage())->withInput()
// ;
//         }
    }

    public function list(Request $request)
    {
        $list = $this->ads->get_ads_list();
        $ids = $request->bulk_ids;
        if ($request->bulk_action_btn === 'update_status' && is_array($ids) && count($ids)) {
            $data = ['status' => 1];
            (new Ads())->setConnection('tenant')->whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        $search      = $request['search'];
        $query_param = $search ? ['search' => $request['search']] : '';
        $ads     = (new Ads())->setConnection('tenant')->when($request['search'], function ($q) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $q->Where('name', 'like', "%{$value}%")
                    ->orWhere('id', $value);
            }
        })
            ->latest()->paginate()->appends($query_param);

        $data = [
            'ads' => $ads,
            'search'  => $search,

        ];
        return view("dash.ads.list", $data);
    }

    public function create()
    {
        $store = app('store');

        if ($store->theme == 'theme1') {

            $types = CarType::latest()->get();
        } else {

            $types = EstateType::latest()->get();
            $estate_products = EstateProduct::latest()->get();
        }
        $cities = City::with('districts')->get();
        $data = [
            'cities' => $cities,
            'car_types' => $types,
            'estate_products' => isset($estate_products) ? $estate_products : [],

        ];
        return view('dash.ads.create', $data);
    }



    public function show($id)
    {
        $ads = Ads::findOrFail($id);
        $store = app('store');
        if ($store->theme == 'theme1') {
            return view('front.themes.theme2.show', compact('ads'));
        } else {
            return view('front.themes.theme2.show', compact('ads'));
        }
    }










    public function get_models($id)
    {
        $models = CarModel::where('car_type_id', $id)->get();
        return response()->json([
            'success' => true,
            'models' => $models,
        ]);
    }

    public function get_districts_by_id($id)
    {
        $districts = District::where('city_id', $id) ->get();

        return response()->json([
            'success' => true,
            'districts' => $districts,
        ]);
    }
    public function get_cities()
    {
        $cities = City::get();
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
