<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelsSeeder extends Seeder
{
    public function run()
    {
        $jsonPath = public_path('uploads/models.json');

        if (!file_exists($jsonPath)) {
            dd("❌ ملف models.json غير موجود في: {$jsonPath}");
        }

        $data = json_decode(file_get_contents($jsonPath), true);

        if (!isset($data['allmodels'])) {
            dd("⚠️ الملف لا يحتوي على مفتاح allmodels");
        }

        foreach ($data['allmodels'] as $item) {
            $carTypeId = DB::table('car_types')->insertGetId([
                'name_ar'    => $item['elmark'],
                'name_en'    => null,
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($item['models'] as $modelName) {
                DB::table('car_models')->insert([
                    'car_type_id' => $carTypeId,
                    'name_ar'     => $modelName,
                    'name_en'     => null,
                    'name'        => null,
                    'status'      => 'active',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        echo "✅ تم إضافة جميع الماركات والموديلات بنجاح.\n";
    }
}
