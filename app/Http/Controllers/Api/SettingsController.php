<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SettingsRepository;
use App\Repositories\ThemeRepository;
use Illuminate\Support\Facades\Validator;
use App\Exports\ordersExport;
use Maatwebsite\Excel\Facades\Excel;

class SettingsController extends Controller
{
    protected $settings, $themes;

    public function __construct(SettingsRepository $settings, ThemeRepository $themes)
    {
        $this->settings = $settings;
        $this->themes = $themes;
    }

    public function index()
    {
        return response()->apiSuccess(null, 'Settings panel ready');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:3000',
        ]);

        if ($validator->fails()) {
            return response()->apiFail('صورة اللوجو غير ملائمة', 422);
        }

        if ($request->hasFile('logo')) {
            $this->settings->uploadLogo($request->logo);
        }

        $this->settings->updateSystemSettings([
            'system_title' => $request->system_title,
            'global_txt_m' => $request->global_txt_m,
            'slider' => $request->has('slider') ? 1 : 0,
            'global_meta_description' => $request->global_meta_description,
            'global_meta_keywords' => $request->global_meta_keywords,
            'main_color' => $request->main_color,
            'global_copyright' => $request->global_copyright,
        ]);

        return response()->apiSuccess(null, 'تم تحديث الاعدادات!');
    }

    public function themeUpdate($theme)
    {
        $themeSettings = $this->themes->getThemeSettings($theme);
        return response()->apiSuccess($themeSettings, 'تم تحميل إعدادات القالب');
    }

    public function themeUpdatePost(Request $request, $theme)
    {
        $json = $request->array ?? [];


        $saved = $this->themes->saveThemeSettings($theme, $json);

        if ($saved) {
            return response()->apiSuccess(null, 'تم تحديث القالب!');
        }

        return response()->apiFail('حدث خطأ أثناء الحفظ', 500);
    }

    public function export()
    {
        return response()->apiSuccess(null, 'جاهز للتصدير');
    }

    public function exportStore(Request $request)
    {
        $date = now()->format('Y-m-d');
        return Excel::download(new ordersExport($request), "$date-orders.xlsx");
    }
}
