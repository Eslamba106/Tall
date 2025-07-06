<?php

use App\Models\Store;
use App\Models\ThemeSettings;
use Illuminate\Support\Facades\Cache;

if (!function_exists('getTheme')) {
    # return system settings value
    function getTheme($request)
    { 
            $store = Store::getStore(  $request); 
            return $store->theme;
         
    }


}

if (!function_exists('getMainThemeSetting')) {
    function getMainThemeSetting($default = null)
    {
        try {
            $activeTheme = getTheme(request());
            if (!$activeTheme) {
                $activeTheme = 'theme1';
            }
            $store = Store::getStore(request());
            // dd($store);
            $cacheKey = "theme_settings_:{$store}";

            // if (Cache::has($cacheKey)) {
            //     return Cache::get($cacheKey);
            // }
            $settings = ThemeSettings::where('theme', $activeTheme)->first();
            // dd($settings);
            if ($settings && $settings->value !== null) {
                $decodedSettings = json_decode($settings->value);
                // Cache the settings for future use
                Cache::put($cacheKey, $decodedSettings, now()->addMinutes(60));
                return $decodedSettings;
            } else {
                return $default;
            }
        } catch (\Throwable $th) {
            return $default;
        }
    }
}

if (! function_exists('main_path')) {
    function main_path()
    {
        return 'public/';
        // return 'assets/';
    }
}


if (!function_exists('get_theme_view')) {
    # get view of theme
    function get_theme_view($path, $data = [])
    {
        $theme = getTheme(request());
        return view('store.' . $theme . '.' . $path, $data);
    }
}


