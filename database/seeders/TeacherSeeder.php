<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $teachers = [
            [
                'name'        => 'Mufti Aftab Ahmed Abbasi',
                'role'        => 'Tajweed Specialist',
                'image'       => 'settings/team-1.jpg',
                'sort_order'  => 1,
                'is_active'   => true,
            ],
            [
                'name'        => 'Hafiz Kamran Qureshi',
                'role'        => 'Quran Teacher',
                'image'       => 'settings/team-2.jpg',
                'sort_order'  => 2,
                'is_active'   => true,
            ],
            [
                'name'        => 'Allama Noor Ur Rehman',
                'role'        => 'Islamic Studies Teacher',
                'image'       => 'settings/team-3.jpg',
                'sort_order'  => 3,
                'is_active'   => true,
            ],
            [
                'name'        => 'Ustaz Yusuf Ahmed',
                'role'        => 'Arabic Language Teacher',
                'image'       => 'settings/team-4.jpg',
                'sort_order'  => 4,
                'is_active'   => true,
            ],
            [
                'name'        => 'Sheikh Bilal Hassan',
                'role'        => 'Hifz Coordinator',
                'image'       => 'settings/team-5.jpg',
                'sort_order'  => 5,
                'is_active'   => true,
            ],
            [
                'name'        => 'Maulana Asif',
                'role'        => 'Islamic Studies',
                'image'       => 'settings/team-6.jpg',
                'sort_order'  => 6,
                'is_active'   => true,
            ],
        ];

        foreach ($teachers as $teacher) {
            DB::table('teachers')->insert(array_merge($teacher, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
