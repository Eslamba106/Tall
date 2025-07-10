<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OfferService;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
     public $offer; 
    public function __construct(OfferService $offer)
    {
        $this->offer = $offer; 

    }
        public function store(Request $request)
    {

        $main_offer = $this->offer->store_offer($request);
        if (!$main_offer) {
            return response()->apiFail('Failed to add Offer', 500);
        }
        return response()->apiSuccess( 'Offer added successfully' , $main_offer );
    }
    public function update(Request $request, $id)
    {
        $offer = $this->offer->update_offer($id, $request);
        if (!$offer) {
            return response()->apiFail('Offer not found', 404);
        }
        return response()->apiSuccess('Offer updated successfully' ,$offer );
    }
    public function get_offer($id)
    {
        $offer = $this->offer->get_offer($id);
        if (!$offer) {
            return response()->apiFail('Offer not found', 404);
        }
        return response()->apiSuccess( $offer );
    }
    public function list(Request $request)
    {
        // return("user" .auth('sanctum')->check());

        $list = $this->offer->get_offer_list();
        return response()->apiSuccess('Offer List ', $list);
    }
    public function delete($id)
    {
        $offer = $this->offer->delete_offer($id);
        if (!$offer) {
            return response()->apiFail('Offer not found', 404);
        }
        return response()->apiSuccess( 'Offer deleted successfully',$offer );
    }
}
