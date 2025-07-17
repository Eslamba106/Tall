<?php

namespace App\Repositories;

use App\Models\ThemeSettings;
use Illuminate\Support\Facades\Cache;
use App\Facade\Tenants;

class ThemeRepository
{
    public function getThemeSettings(string $theme): array
    {
        $existing = ThemeSettings::where('theme', $theme)->first();
        if ($existing) {
            return json_decode($existing->value, true);
        }

        $path = public_path("uploads/themes/$theme.json");
        return file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    }

    public function saveThemeSettings(string $theme, array $json): bool
    {
        $jsonEncoded = json_encode($json);

        $record = ThemeSettings::firstOrCreate(['theme' => $theme]);
        $record->value = $jsonEncoded;
        $record->save();

        $tenant = Tenants::getTenant();
        Cache::forget("theme_settings_:$tenant");

        return true;
    }
}
