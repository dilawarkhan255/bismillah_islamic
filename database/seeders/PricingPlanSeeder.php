<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingPlanSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $plans = [
            [
                'name'              => 'Starter',
                'badge'             => null,
                'accent_color'      => '#5B8DB8',
                'days_per_week'     => '3',
                'classes_per_month' => '12',
                'courses_count'     => '1',
                'report_frequency'  => 'Monthly',
                'certificate'       => false,
                'is_popular'        => false,
                'features'          => ['Any 1 Course', '30-Min Class', 'Qualified Teacher', 'Makeup Class', 'Female Teacher on Request', 'WhatsApp Contact'],
                'sort_order'        => 1,
            ],
            [
                'name'              => 'Standard',
                'badge'             => 'Most Popular',
                'accent_color'      => '#AE8225',
                'days_per_week'     => '5',
                'classes_per_month' => '20',
                'courses_count'     => '2',
                'report_frequency'  => 'Weekly',
                'certificate'       => true,
                'is_popular'        => true,
                'features'          => ['Any 2 Courses', '30-Min Class', 'Dedicated Teacher', 'Weekly Progress Report', 'Completion Certificate', 'Makeup Class', 'Female Teacher Available', 'Monthly Parent-Teacher Call'],
                'sort_order'        => 2,
            ],
            [
                'name'              => 'Premium',
                'badge'             => 'Premium',
                'accent_color'      => '#7B5EA7',
                'days_per_week'     => '6',
                'classes_per_month' => '24',
                'courses_count'     => 'All',
                'report_frequency'  => 'Weekly + Parent Call',
                'certificate'       => true,
                'is_popular'        => false,
                'features'          => ['ALL Courses Included', '30-Min Class', 'Senior Certified Scholar', 'Weekly Report + Parent Call', 'Certificate of Completion', 'Priority Makeup Classes', 'Female Teacher Available', 'Dedicated WhatsApp Support'],
                'sort_order'        => 3,
            ],
        ];

        foreach ($plans as $plan) {
            DB::table('pricing_plans')->insert(array_merge($plan, [
                'features'    => json_encode($plan['features']),
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]));
        }
    }
}
