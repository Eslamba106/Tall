<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\City;
use App\Models\District;

class DistrictsSeeder extends Seeder
{
    public function run()
    {
        $files = File::files(public_path('assets/city'));
        
        foreach ($files as $file) {
            $data = json_decode(File::get($file), true);

            if (!isset($data['data'])) {
                continue;
            }

            foreach ($data['data'] as $entry) {
                $city = City::firstOrCreate(
                    ['id' => $entry['city_id']],
                    ['name_ar' => $entry['city_name_ar'], 'name_en' => $entry['city_name_en']]
                );

                District::updateOrCreate(
                    ['id' => $entry['id']],
                    [
                        'name_ar' => $entry['name_ar'],
                        'name_en' => $entry['name_en'],
                        'city_id' => $city->id
                    ]
                );
            }

            $this->command->info("تم إدخال بيانات من الملف: " . $file->getFilename());
        }
    }
}
