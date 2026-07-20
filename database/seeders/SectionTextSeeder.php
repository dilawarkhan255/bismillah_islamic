<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SectionTextSeeder extends Seeder
{
    public function run(): void
    {
        $texts = [
            // === HOME PAGE ===
            ['section_home_why_title', 'Why Parents Trust Us For Their Children'],
            ['section_home_why_subtitle', 'Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is a qualified scholar committed to nurturing the next generation of Muslims.'],
            ['section_home_courses_title', 'We Focus On Authentic Islamic Education'],
            ['section_home_trial_title', 'Start Your 3 Days Free Trial Classes'],
            ['section_home_trial_desc', 'Experience the quality of our teaching before you commit. Join our 3-day free trial and let your child learn directly from our qualified Quran teachers — completely free, no obligation.'],
            ['section_home_how_title', 'How It Works'],
            ['section_home_team_title', 'Meet Our Qualified Scholars'],
            ['section_home_testimonials_title', 'What Our Students & Parents Say'],

            // === ABOUT PAGE ===
            ['section_about_hero_title', 'About Us'],
            ['section_about_title', 'Bismillah Islamic Academy With 10 Years Of Excellence'],
            ['section_about_para1', 'Bismillah Islamic Academy was founded with one mission — to provide every Muslim student with authentic, accessible, and high-quality Islamic education. We believe that knowledge of the Quran and Sunnah is the foundation of a righteous life.'],
            ['section_about_para2', 'From our humble beginning with just a few students, we have grown into a thriving academy with over 1,500 students, 25 qualified teachers, and a curriculum that spans Quran recitation, Tajweed, Hifz, Islamic Studies, and Arabic Language.'],
            ['section_about_founder_name', 'Sheikh Abdullah'],
            ['section_about_founder_role', 'Founder & Principal'],
            ['section_about_mission_title', 'Our Mission'],
            ['section_about_mission_text', 'To provide every Muslim student with authentic, accessible, and high-quality Islamic education — rooted in the Quran and Sunnah — through qualified scholars, modern methods, and a nurturing environment that develops both character and knowledge.'],
            ['section_about_vision_title', 'Our Vision'],
            ['section_about_vision_text', 'To become the most trusted Islamic academy in the world — a place where generations of Muslims connect deeply with their Deen, memorize the Quran, and carry the light of Islamic knowledge into every corner of their lives.'],
            ['section_about_story_title', 'Our Story'],

            // === COURSES PAGE ===
            ['section_courses_hero_title', 'Our Islamic Courses'],
            ['section_courses_hero_subtitle', 'From the first Arabic letter to complete Quran memorization — a structured path for every student.'],
            ['section_courses_intro_title', 'Authentic Islamic Education For Every Age & Level'],
            ['section_courses_intro_desc', 'Our comprehensive Islamic curriculum is carefully designed for every age — from beginners learning the Arabic alphabet to advanced Hifz students completing the entire Quran. All courses are taught by certified scholars using modern and traditional teaching methods.'],
            ['section_courses_grid_title', 'All Available Courses'],

            // === GALLERY PAGE ===
            ['section_gallery_hero_title', 'Academy Gallery'],
            ['section_gallery_hero_subtitle', 'Cherished moments from our classes, ceremonies, and community events'],

            // === TEAM PAGE ===
            ['section_team_hero_title', 'Our Teachers'],
            ['section_team_title', 'Meet Our Qualified & Dedicated Instructors'],
            ['section_team_desc', 'Our teachers are certified scholars and experienced educators committed to delivering authentic Islamic education with care and excellence.'],

            // === OUR TEAM PAGE ===
            ['section_ourteam_title', 'Meet Our Dedicated Team'],
            ['section_ourteam_desc', 'Our team of qualified scholars and experienced educators is committed to delivering authentic Islamic education with care, excellence, and devotion.'],

            // === CONTACT PAGE ===
            ['section_contact_title', 'Have a Question? We\'re Here'],
            ['section_contact_desc', 'Fill the form and our team will respond within 24 hours, In sha Allah.'],

            // === PRICING PAGE ===
            ['section_pricing_hero_title', 'Choose Your Learning Plan'],
            ['section_pricing_hero_desc', 'All plans are 30-minute live one-on-one sessions via Microsoft Teams. Every plan includes a 3-day free trial.'],

            // === FREE TRIAL PAGE ===
            ['section_trial_hero_title', 'Book Your FREE Trial Today'],
            ['section_trial_hero_desc', 'Live one-on-one classes via Microsoft Teams. Certified scholars. Female teachers available. Completely free for 3 days.'],
            ['section_trial_how_title', 'How It Works'],

            // === BLOG PAGE ===
            ['section_blog_title', 'Articles & Blog'],

            // === PRIVACY PAGE ===
            ['section_privacy_subtitle', 'Your trust is our amanah. Here\'s how we protect your information.'],

            // === FOOTER ===
            ['footer_tagline_site', 'Our mission is to provide authentic Islamic education to Muslims worldwide, nurturing the next generation of believers with knowledge of the Quran and Sunnah.'],

            // === ABOUT TIMELINE ===
            ['timeline_2016_title', 'Academy Founded'],
            ['timeline_2016_text', 'Bismillah Islamic Academy was established in Islamabad with a small group of dedicated students and 2 qualified teachers. The journey began with a single mission — authentic Quranic education for all.'],
            ['timeline_2018_title', 'First Hifz Batch Completed'],
            ['timeline_2018_text', 'A proud milestone — our very first batch of Hifz students completed the memorization of the entire Holy Quran. A graduation ceremony was held to honor their dedication and hard work.'],
            ['timeline_2020_title', 'Curriculum Expanded'],
            ['timeline_2020_text', 'We introduced new courses including Tajweed ul Quran, Islamic Studies, and Arabic Language — transforming into a full Islamic education institution with 10+ qualified scholars.'],
            ['timeline_2022_title', 'Online Expansion'],
            ['timeline_2022_text', 'Bismillah Academy went digital — launching a full online learning platform to reach Muslim students worldwide. Students from UK, USA, Canada, and Australia joined our growing family.'],
            ['timeline_2024_title', '500+ Hafiz Graduates'],
            ['timeline_2024_text', 'A historic achievement — over 500 students completed full Quran memorization. Academy expanded with new teachers, new courses, and students enrolling from 15+ countries worldwide.'],
        ];

        foreach ($texts as $item) {
            SiteSetting::updateOrCreate(
                ['key' => $item[0]],
                ['value' => $item[1], 'group' => 'text']
            );
        }
    }
}
