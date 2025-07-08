<?php

namespace App\Http\Controllers;

use App\Services\AdsService;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public $ads;
    public $model;
    public function __construct(AdsService $ads){
        $this->ads = $ads;
    }

      public function store(Request $request){
        try{
            $main_ads = $this->ads->store_ads($request);
            return redirect()->route('complaint_category.index')->with('success',__('property_master.added_successfully'));
        }catch(\Exception $e){
            // Log::error($e->getMessage());
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
