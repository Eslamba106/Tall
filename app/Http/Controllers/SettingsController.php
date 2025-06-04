<?php

namespace App\Http\Controllers;

use Image;
use App\Facade\Tenants;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\ThemeSettings;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ordersExport;

class SettingsController extends Controller
{
    public function themeUpdate($theme){
        $theme_settings = getSetting('theme_settings');
        $path = public_path('uploads/themes/');
        $path = $path . $theme . ".json";
        $getStoreThemeSetting = [];
        $getStoreTheme = ThemeSettings::where('theme',$theme)->first();


        if (empty($getStoreTheme)) {
            $getStoreThemeSetting = json_decode(file_get_contents($path), true);
        }else{
            $getStoreThemeSetting = json_decode($getStoreTheme->value, true);
        }
        return view('settings.edit_theme', compact('theme','theme_settings','getStoreThemeSetting'));
    }
    public function themeUpdatePost(Request $request, $theme){
        $json = $request->array;
        foreach ($json as $key => $jsn) {
        foreach ($jsn['inner_list'] as $IN_key => $js) {

        if ($js['field_type'] == 'photo upload') {
            if ($jsn['array_type'] == 'inner_list') {
                for ($i = 0; $i < $jsn['loop_number']; $i++) {
                    if (empty($json[$key][$js['field_slug']][$i]['field_prev_text'])) {
                        $json[$key][$js['field_slug']][$i]['field_prev_text'] = $js['field_default_text'];
                    }

                    if (!empty($json[$key][$js['field_slug']][$i]['image']) && gettype($json[$key][$js['field_slug']][$i]['image']) == 'object') {
                        $file = $json[$key][$js['field_slug']][$i]['image'];
                        $filenameWithExt = $file->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore = $i . '_' . rand(10, 100) . '_' . date('ymd') . '.' . $extension;
                        $file_name[] = $fileNameToStore;

                        $dir = public_path('uploads/themes/');
                        $image = Image::make($file);

                        if (!file_exists($dir)) {
                            mkdir($dir, 0777, true);
                        }

                        $image->widen(1260, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                         $image->save($dir.$fileNameToStore);
                         if (!empty($file_name) && count($file_name) > 0) {
                            $json[$key][$js['field_slug']][$i]['image'] =  '/themes/' . $fileNameToStore;
                            $json[$key][$js['field_slug']][$i]['field_prev_text'] = '/themes/' . $fileNameToStore;
                        }
                    }
                }
            } else {

                if (gettype($js['field_default_text']) == 'object') {

                    $file = $js['field_default_text'];
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . date('ymd') .  '.' . $extension;
                    $file_name[] = $fileNameToStore;
                    return $file_name;

                    $dir = public_path('uploads/themes/');
                    $image = Image::make($file);

                    if (!file_exists($dir)) {
                        mkdir($dir, 0777, true);
                    }

                    $image->widen(650, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                     $image->save($dir.$fileNameToStore);

                     if (!empty($file_name) && count($file_name) > 0) {

                        $post['Bckground Image'] = implode(',', $file_name);
                        $headerImage = '/themes/' . $post['Bckground Image'];
                        $json[$key]['inner_list'][$IN_key]['field_default_text'] = $headerImage;
                    }
                }
            }
        }
        $activeTheme = getSetting('theme');
        if (!$activeTheme) {
            $activeTheme = 'theme1';
        }
        $tenant = Tenants::getTenant();
        $cacheKey = "theme_settings_:{$tenant}";
        Cache::forget($cacheKey);
        //cacheClear();
    }
}



        $json = json_encode($json);




        if (!empty($json)) {

            $settingExst = ThemeSettings::where('theme',$theme)->first();
            if (!empty($settingExst)) {
                $settingExst->value =  $json;
                $settingExst->save();
            }else{
            ThemeSettings::create(
                [
                    'theme' => $theme,
                    'value' => $json
                ]);
            }

        return redirect()->back()->withInput()->with(
            'success', __('تم تحديث القالب!')
        );
    }
    return redirect()->back()->withInput()->with(
        'error', __('حدث خطأ ما!')
    );
}
public function index()
{
    return view('settings.index');
}
public function update(Request $request)
{
    $validator = \Validator::make($request->all(),[
        'logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:3000',
    ]);
    if ($validator->fails()) {
        $msg['flag'] = 'error';
        $msg['msg']  = $validator->errors()->first();
        return redirect()->back()->with(
            'error', __('صورة اللوجو غير ملائمة !')
        );;
    }

    if(!empty($request->logo))
    {
       $path = public_path('uploads/settings/');

       !(file_exists($path)) && mkdir($path, 0777, true);
       $image = Image::make($request->logo);

       $name_cover = uniqid() . '_' . trim($request->logo->getClientOriginalName());
       $image->heighten(100, function ($constraint) {
        $constraint->aspectRatio();
    });
     $image->save($path.$name_cover);

        // Logo
        $settings = SystemSetting::firstOrCreate(['entity' => 'logo']);
        $settings->value = $name_cover;
        $settings->save();
    }

    $settings = SystemSetting::firstOrCreate(['entity' => 'system_title']);
    $settings->value = $request->system_title;
    $settings->save();

    $settings = SystemSetting::firstOrCreate(['entity' => 'global_txt_m']);
    $settings->value = $request->global_txt_m;
    $settings->save();

    $settings = SystemSetting::firstOrCreate(['entity' => 'slider']);
    if ($request->slider) {
        $settings->value = 1;
    }else{
        $settings->value = 0;
    }
    $settings->save();


    $settings = SystemSetting::firstOrCreate(['entity' => 'global_meta_description']);
    $settings->value = $request->global_meta_description;
    $settings->save();

    $settings = SystemSetting::firstOrCreate(['entity' => 'global_meta_keywords']);
    $settings->value = $request->global_meta_keywords;
    $settings->save();
    
    $settings = SystemSetting::firstOrCreate(['entity' => 'main_color']);
    $settings->value = $request->main_color;
    $settings->save();

    $settings = SystemSetting::firstOrCreate(['entity' => 'global_copyright']);
    $settings->value = $request->global_copyright;
    $settings->save();

    $tenant = Tenants::getTenant();
    $cacheKey = "system_settings:{$tenant}";
    Cache::forget($cacheKey);
    //cacheClear();

    return redirect()->back()->with(
        'success', __('تم تحديث الاعدادات!')
    );

}
public function export()
{
    return view('settings.export');
}
public function exportStore(Request $request)
{
    $date = date('Y-m-d');
    return Excel::download(new ordersExport($request), $date.'-orders.xlsx');
}
}
