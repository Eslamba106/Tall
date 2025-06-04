<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'id' => 1,
                'name' => 'البيسك',
                'price' => 0.00,
                'duration' => 30,
                'max_orders' => 100,
                'description' => 'خطة تجريبية جديدة',
                'created_at' => Carbon::parse('2025-01-02 11:48:38'),
                'updated_at' => Carbon::parse('2025-01-03 11:48:38'),
            ],
            [
                'id' => 2,
                'name' => 'بلس',
                'price' => 99.00,
                'duration' => 30,
                'max_orders' => 200,
                'description' => 'وصف الخطة الجديدة كليا المتقدمة',
                'created_at' => null, 
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'برو',
                'price' => 299.00,
                'duration' => 30,
                'max_orders' => 1000,
                'description' => '1000', 
                'created_at' => null,
                'updated_at' => null,
            ],
        ];
        foreach ($plans as $planData) {
            Subscription::updateOrCreate(
                ['id' => $planData['id']], 
                $planData
            );
        }

        User::updateOrCreate(
            ['email' => 'admin@tall3.com'], 
            [
                'id' => 100, 
                'name' => 'مستخدم تجريبي',
                'username' => 'adminmain',
                'phone' => '1234567890',
                'email' => 'admin@tall3.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin@tall3.com'), // تشفير كلمة المرور العادية
                'subscription' => 3,
                'duration' => now()->addMonth(),
                'type' => 1,
                'email_verified_at' => now(),
                'super' => 1,
                'admin' => 1,
                'affiliate' => null,
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
