<?php
namespace App\Repo;

use App\Models\Offer;

class OfferRepo extends AbstractRepo
{
    public function __construct()
    {
        parent::__construct(Offer::class);
    }

    public function delete_offer($id)
    {
        $offer = Offer::find($id);

        if ($offer) {
            $offer->delete();
            return true;
        }
        return false;
    }
    public function store_offer($request)
    {
        $request->validate([
            'customer_name'          => 'required|string|max:255',
            'customer_phone'         => 'required|string|max:20',
            'description'            => 'nullable|string',
            'estate_product_id'      => 'nullable|string',
            'estate_type_id'         => 'nullable|string',
            'estate_transactions_id' => 'nullable|string',
            'district_id'            => 'nullable|string',
            'city_id'                => 'nullable|string',
            'model_year'             => 'nullable|string',
            'car_model_id'           => 'nullable|string',
            'car_type_id'            => 'nullable|string',
        ]);
        $offer                         = new Offer();
        $offer->customer_name          = $request->customer_name;
        $offer->customer_phone         = $request->customer_phone;
        $offer->description            = $request->description;
        $offer->estate_product_id      = $request->estate_product_id;
        $offer->estate_type_id         = $request->estate_type_id;
        $offer->estate_transactions_id = $request->estate_transactions_id;
        $offer->district_id            = $request->district_id;
        $offer->city_id                = $request->city_id;
        $offer->model_year             = $request->model_year;
        $offer->car_model_id           = $request->car_model_id;
        $offer->car_type_id            = $request->car_type_id;
        $offer->save();

        return $offer;
    }
    public function update_offer($id, $request)
    {
        $offer = Offer::find($id);
        if ($offer) {
            $offer->customer_name          = $request->customer_name;
            $offer->customer_phone         = $request->customer_phone;
            $offer->description            = $request->description;
            $offer->estate_product_id      = $request->estate_product_id;
            $offer->estate_type_id         = $request->estate_type_id;
            $offer->estate_transactions_id = $request->estate_transactions_id;
            $offer->district_id            = $request->district_id;
            $offer->city_id                = $request->city_id;
            $offer->model_year             = $request->model_year;
            $offer->car_model_id           = $request->car_model_id;
            $offer->car_type_id            = $request->car_type_id;
            $offer->save();
            return $offer;
        }
        return false;
    }
    public function offer_list()
    {
        return Offer::get();
    }

}
