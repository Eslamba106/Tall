<?php

namespace App\Repositories\Interfaces;

interface SettingsRepositoryInterface
{
    public function updateSystemSettings(array $data);
    public function uploadLogo($image);
}
