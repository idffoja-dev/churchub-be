<?php

namespace Database\Seeders;

use App\Models\Central\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Free',
                'slug' => 'free',
                'price' => 0.00,
                'billing_cycle' => 'free',
                'features' => [
                    'members' => 50,
                    'admins' => 1,
                    'sms' => false,
                    'reports' => false,
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Standard',
                'slug' => 'standard',
                'price' => 29.00,
                'billing_cycle' => 'monthly',
                'features' => [
                    'members' => 500,
                    'admins' => 5,
                    'sms' => true,
                    'reports' => true,
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Premium',
                'slug' => 'premium',
                'price' => 79.00,
                'billing_cycle' => 'monthly',
                'features' => [
                    'members' => -1,   // unlimited
                    'admins' => -1,   // unlimited
                    'sms' => true,
                    'reports' => true,
                ],
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::firstOrCreate(['slug' => $plan['slug']], $plan);
        }
    }
}
