<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\Visitor;
use App\Models\PlanRequst;
use App\Models\TenantStor;
use App\Models\Subscription;
use App\Models\SystemSetting;
use App\Models\ThemeSettings;
/*
*   Helper File 
*/
if (!function_exists('getAsset')) {
    #  Generate an asset path for the uploaded files.
    function getAsset($file,$quality = 'hd')
    {
        return asset('/uploads/cover_image/'.$quality . '_' . $file);
    }
}

if (!function_exists('getSetting')) {
    # return system settings value
    function getSetting($key, $default = null)
    {
        try {
            $tenant = Tenants::getTenant();
            $cacheKey = "system_settings:{$tenant}:{$key}";

            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
            $cachedSettings = Cache::remember("system_settings:{$tenant}", now()->addMinutes(60), function () {
                return SystemSetting::all();
            });
            $setting = $cachedSettings->firstWhere('entity', $key);
            return $setting ? $setting->value : $default;
        } catch (\Throwable $th) {
            return $default;
        }
    }
}

// if (!function_exists('getThemeSetting')) {
//     function getThemeSetting($default = null)
//     {
//         try {
//             $activeTheme = getSetting('theme');
//             if (!$activeTheme) {
//                 $activeTheme = 'theme1';
//             }
//             $tenant = Tenants::getTenant();
//             $cacheKey = "theme_settings_:{$tenant}";

//             if (Cache::has($cacheKey)) {
//                 return Cache::get($cacheKey);
//             }
//             $settings = ThemeSettings::where('theme', $activeTheme)->first();

//             if ($settings && $settings->value !== null) {
//                 $decodedSettings = json_decode($settings->value);
//                 // Cache the settings for future use
//                 Cache::put($cacheKey, $decodedSettings, now()->addMinutes(60));
//                 return $decodedSettings;
//             } else {
//                 return $default;
//             }
//         } catch (\Throwable $th) {
//             return $default;
//         }
//     }
// }

if (!function_exists('getView')) {
    # get view of theme
    function getView($path, $data = [])
    {
        $theme = getSetting('theme');
        return view('store.' . $theme . '.' . $path, $data);
    }
}

if (!function_exists('ChangeSubscribe')) {
    function ChangeSubscribe($id,$userId,$duration,$price,$orders = 0,$durationAuto = 0,$stx = false,$auto = true)
    {
        $duration = Carbon::now()->addDays($duration);
        if ($durationAuto != 0) {
            $duration = $durationAuto;
        }
        $plan = Subscription::findOrFail($id);
        $user = User::findOrFail($userId);
        $sumold = 0;

        if ($user->type == $plan->id && $user->store - $user->orders > 0) {
            $sumold = $user->store - $user->orders;
        }

        $user->type = $plan->id;
        $user->store = $orders + $sumold;
        $user->orders = 0;
        $user->save();
        if ($auto) {
        PlanRequst::create([
            'user_id' => $userId,
            'plan_id' => $id,
            'price' => $price,
            'active' => 1,
            'duration' => $duration,
        ]);
        } else {
            $planRequst = PlanRequst::where('user_id',$userId)->latest()->first();
            $planRequst->active = 1;
            $planRequst->save();
        }
        $tenantStor = TenantStor::where('user_id',$userId)->first();
        $tenantStor->duration = $duration;
        $tenantStor->subscription = $id;
        $tenantStor->save();

        $user = User::where('id',$userId)->first();
        $user->duration = $duration;
        $user->subscription = $id;
        $user->save();
        TenantStor::where('active', 0)->update(['active' => 1]);

        $tenants = Tenant::where('user_id',$userId)->get();

    }
}





if (!function_exists('DontChangeSubscribe')) {
    function DontChangeSubscribe($id,$userId,$duration,$price,$orders = 0,$durationAuto = 0,$store =0)
    {
        $duration = Carbon::now()->addDays($duration);
        if ($durationAuto != 0) {
            $duration = $durationAuto;
        }
        $plan = Subscription::findOrFail($id);
        $user = User::findOrFail($userId);

        $user->store = $orders;
        $user->orders = $store;
        $user->save();

        $tenantStor = tenantStor::where('user_id',$userId)->first();
        $tenantStor->duration = $duration;
        $tenantStor->subscription = $id;
        $tenantStor->save();

        $user = User::where('id',$userId)->first();
        $user->duration = $duration;
        $user->subscription = $id;
        $user->save();
        tenantStor::where('active', 0)->update(['active' => 1]);

        $tenants = Tenant::where('user_id',$userId)->get();

    }
}
if (!function_exists('VisitorCounter')) {
    function VisitorCounter($request,$id)
    {
        $visitor  = new Visitor;
        $visitor->product_id = $id;
        $visitor->ip_address = $request->ip();
        $visitor->device = getDevice($request->header('User-Agent'));
        $visitor->referer = $request->header('referer');
        $visitor->save();
    }

    function getDevice($userAgent)
    {
    if (stripos($userAgent, 'Android') !== false) {
        return 'Android';
    } elseif (stripos($userAgent, 'iPhone') !== false || stripos($userAgent, 'iPad') !== false) {
        return 'iOS';
    } else {
        return 'Desktop';
    }
    }
}
