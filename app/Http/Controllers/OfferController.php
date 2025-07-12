<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CarType;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Models\EstateProduct;
use App\Services\OfferService;
use App\Models\EstateProductType;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\EstateProductTransaction;
use App\Models\Offer;

class OfferController extends Controller
{
      public $offer; 
    public function __construct(OfferService $offer)
    {
        $this->offer = $offer; 

    }
     public function requests() {
        $cities = City::get(); 
        $estate_products = EstateProduct::get(); 
        $estate_types = EstateProductType::get(); 
        $estate_transactions = EstateProductTransaction::get(); 
        $car_types  = CarType::get();
        $car_models = CarModel::get();
    
        $data = [
            'cities'                    => $cities,
            'estate_products'           => $estate_products,
            'car_types'                 => $car_types,
            'car_models'                => $car_models,
            'estate_types'              => $estate_types,
            'estate_transactions'       => $estate_transactions,
        ];
        return get_my_theme('add_offer', $data);

    }

      public function store(Request $request)
    {

        $main_offer = $this->offer->store_offer($request);
        if (!$main_offer) {
            return redirect()->back()->withInput();
        }
                    Toastr::success(translate('تم اضافة الطلبل بنجاح'));

        return to_route('index');
    }
    public function list(Request $request)
    {
        $list = $this->offer->get_offer_list();
        $ids = $request->bulk_ids;
        if ($request->bulk_action_btn === 'update_status' && is_array($ids) && count($ids)) {
            $data = ['status' => 1];
            (new Offer())->setConnection('tenant')->whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        $search      = $request['search'];
        $query_param = $search ? ['search' => $request['search']] : '';
        $offer     = (new Offer())->setConnection('tenant')->when($request['search'], function ($q) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $q->Where('customer_name', 'like', "%{$value}%")
                    ->orWhere('id', $value);
            }
        })
            ->latest()->paginate()->appends($query_param);

        $data = [
            'offers' => $offer,
            'search'  => $search,

        ];
        return view("dash.offer.list", $data);
    }

}
