<?php

namespace App\Repositories\Interfaces;

interface ThemeRepositoryInterface
{
    public function getThemeSettings(string $theme);
    public function saveThemeSettings(string $theme, array $data);
}

