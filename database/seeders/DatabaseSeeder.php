<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SiteSettingSeeder::class,
            ImageSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            TestimonialSeeder::class,
            HeroSlideSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            PricingPlanSeeder::class,
            GalleryItemSeeder::class,
            SectionSeeder::class,
        ]);
    }
}
