<?php

namespace App\Repositories;

use App\Models\SystemSetting;
use Illuminate\Support\Facades\Cache;
use App\Facade\Tenants;
use Intervention\Image\Facades\Image;

class SettingsRepository
{
    public function uploadLogo($image)
    {
        $path = public_path('uploads/settings/');
        !is_dir($path) && mkdir($path, 0777, true);

        $imageInstance = Image::make($image);
        $name = uniqid() . '_' . trim($image->getClientOriginalName());
        $imageInstance->heighten(100, function ($c) {
            $c->aspectRatio();
        });
        $imageInstance->save($path . $name);

        $setting = SystemSetting::firstOrCreate(['entity' => 'logo']);
        $setting->value = $name;
        $setting->save();

        return $name;
    }

    public function updateSystemSettings(array $data)
    {
        foreach ($data as $entity => $value) {
            $setting = SystemSetting::firstOrCreate(['entity' => $entity]);
            $setting->value = $value;
            $setting->save();
        }

        $tenant = Tenants::getTenant();
        Cache::forget("system_settings:$tenant");
    }
}
