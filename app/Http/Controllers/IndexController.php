<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Estate;
use Illuminate\Support\Facades\Hash;
use App\Facade\Tenants;
use App\Models\EstateType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function estatefilter(Request $request) {
        
        $estates = Estate::latest();
        if ($request->theme && $request->theme == 'theme2') {
            if ($request->type != 0) {
                $estates = $estates->where('estatetxt',$request->type);
            }
            if ($request->goal != 0) {
                $estates = $estates->where('type',$request->goal);
            }
            if ($request->model != 0) {
                $estates = $estates->where('model',$request->model);
            }
            if ($request->status) {
                $estates = $estates->where('newer',$request->status);
            }
            $estates = $estates->paginate(10);
            return view('homeFilter2',compact('estates'))->render();
        }
        if ($request->data != 0) {
            $estates = $estates->where('estate',$request->data);
        }
        if ($request->city != 0) {
            $estates = $estates->where('city',$request->city);
        }
        if ($request->goal != 0) {
            $estates = $estates->where('goal',$request->goal);
        }
        if ($request->type != 0) {
            $estates = $estates->where('type',$request->type);
        }
        $estates = $estates->paginate(10);
        return view('homeFilter',compact('estates'))->render();
    }
    public function index(Request $request) {
        
            $tenant = Tenants::getTenant();
        if (!empty($tenant)) {
          
            $estateType = EstateType::latest()->where('active',1)->get();
            $estateModel = null;
            $types = null;
            if (getSetting('theme') == 'theme2') {
            $types = Estate::distinct()->pluck('type');
            $estateModel = Estate::distinct()->pluck('model');
            }

            $estateAll = Estate::where('status',1)->count();
            $estateSell = Estate::where('status',1)->where('goal','بيع')->count();
            $estateRent = Estate::where('status',1)->where('goal','ايجار')->count();
            $estatStatet = Estate::where('status',1)->pluck('state');

            VisitorCounter($request,0);
            return getView('home', compact('estateType','estateAll','estateSell','estateRent','estatStatet','estateModel','types'));
        }else{
               
            return view('landingpage');
        }
    }
    public function state(Request $request) {
        $filedata = file_get_contents(asset('assets/city.json'));
        $details = json_decode($filedata,true)['data'];
        function getDetailsByCityId(array $details, int $cityId): array
{
    $filteredDetails = [];
    foreach ($details as $detail) {
        if ($detail['city_id'] === $cityId) {
            $filteredDetails[] = $detail;
        }
    }
    return $filteredDetails;
}
        $cityIdToFind = $request->state;
        $cityDetails = getDetailsByCityId($details, $cityIdToFind);
        return $cityDetails;
    }

    public function model(Request $request) {
        $filedata = file_get_contents(asset('uploads/models.json'));
        $details = json_decode($filedata,true)['allmodels'];
        function getDetailsByCityId(array $details, $cityId): array
            {
                $filteredDetails = [];
                foreach ($details as $detail) {
                    if ($detail['elmark'] == $cityId) {
                        $filteredDetails[] = $detail['models'];
                    }
                }
                return $filteredDetails;
            }
        $cityIdToFind = $request->state;
        $cityDetails = getDetailsByCityId($details, $cityIdToFind);
        return $cityDetails;
    }
    public function autoLogin(Request $request)
    {
        $domain = Store::first()->domain;
        
        if (Hash::check($domain, $request->token)) {
            $user = User::findOrFail(1);
            Auth::login($user);    
        }
        return Redirect::route('index');
    }
    public function autoLoginBase(Request $request,$hash)
    {
        $name = decrypt($hash);
        $domain = Store::where('domain',$name)->first();
        if ($domain) {
            $user = User::findOrFail(1);
            Auth::login($user);    
        }
        return Redirect::route('dashboard.index');
    }
}
