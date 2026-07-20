<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            // === HOME PAGE ===
            ['home', 'hero', 'Bismillah Islamic Academy', 'Learn Quran & Islamic Studies Online', 'Join thousands of students worldwide learning Quran, Tajweed, Arabic, and Islamic Studies from certified scholars — all from the comfort of your home.', null, 'Start Free Trial', '/free-trial', 1],
            ['home', 'why_title', 'Why Parents Trust Us For Their Children', null, 'Our academy combines traditional Islamic teaching methods with modern pedagogy. Every teacher is a qualified scholar committed to nurturing the next generation of Muslims.', null, null, null, 2],
            ['home', 'courses_title', 'We Focus On Authentic Islamic Education', null, null, null, null, null, 3],
            ['home', 'trial_title', 'Start Your 3 Days Free Trial Classes', null, 'Experience the quality of our teaching before you commit. Join our 3-day free trial and let your child learn directly from our qualified Quran teachers — completely free, no obligation.', null, 'Claim Free Trial', '/free-trial', 4],
            ['home', 'how_title', 'How It Works', null, null, null, null, null, 5],
            ['home', 'team_title', 'Meet Our Qualified Scholars', null, null, null, 'View All Teachers', '/teachers', 6],
            ['home', 'testimonials_title', 'What Our Students & Parents Say', null, null, null, null, null, 7],
            ['home', 'contact_title', 'Have a Question? We\'re Here', null, 'Fill the form and our team will respond within 24 hours, In sha Allah.', null, null, null, 8],

            // === ABOUT PAGE ===
            ['about', 'hero', 'About Us', null, null, null, null, null, 1],
            ['about', 'intro_title', 'Bismillah Islamic Academy With 10 Years Of Excellence', null, 'Bismillah Islamic Academy was founded with one mission — to provide every Muslim student with authentic, accessible, and high-quality Islamic education. We believe that knowledge of the Quran and Sunnah is the foundation of a righteous life. From our humble beginning with just a few students, we have grown into a thriving academy with over 1,500 students, 25 qualified teachers, and a curriculum that spans Quran recitation, Tajweed, Hifz, Islamic Studies, and Arabic Language.', null, null, null, 2],
            ['about', 'founder', 'Sheikh Abdullah', 'Founder & Principal', null, null, null, null, 3],
            ['about', 'mission', 'Our Mission', null, 'To provide every Muslim student with authentic, accessible, and high-quality Islamic education — rooted in the Quran and Sunnah — through qualified scholars, modern methods, and a nurturing environment that develops both character and knowledge.', null, null, null, 4],
            ['about', 'vision', 'Our Vision', null, 'To become the most trusted Islamic academy in the world — a place where generations of Muslims connect deeply with their Deen, memorize the Quran, and carry the light of Islamic knowledge into every corner of their lives.', null, null, null, 5],
            ['about', 'story_title', 'Our Story', 'From a single classroom to a global academy — every step guided by faith and dedication.', null, null, null, null, 6],
            ['about', 'story_2016', '2016: Academy Founded', null, 'Bismillah Islamic Academy was established in Islamabad with a small group of dedicated students and 2 qualified teachers. The journey began with a single mission — authentic Quranic education for all.', null, null, null, 7],
            ['about', 'story_2018', '2018: First Hifz Batch Completed', null, 'A proud milestone — our very first batch of Hifz students completed the memorization of the entire Holy Quran. A graduation ceremony was held to honor their dedication and hard work.', null, null, null, 8],
            ['about', 'story_2020', '2020: Curriculum Expanded', null, 'We introduced new courses including Tajweed ul Quran, Islamic Studies, and Arabic Language — transforming into a full Islamic education institution with 10+ qualified scholars.', null, null, null, 9],
            ['about', 'story_2022', '2022: Online Expansion', null, 'Bismillah Academy went digital — launching a full online learning platform to reach Muslim students worldwide. Students from UK, USA, Canada, and Australia joined our growing family.', null, null, null, 10],
            ['about', 'story_2024', '2024: 500+ Hafiz Graduates', null, 'A historic achievement — over 500 students completed full Quran memorization. Academy expanded with new teachers, new courses, and students enrolling from 15+ countries worldwide.', null, null, null, 11],

            // === COURSES PAGE ===
            ['courses', 'hero', 'Our Islamic Courses', 'From the first Arabic letter to complete Quran memorization — a structured path for every student.', null, null, null, null, 1],
            ['courses', 'intro_title', 'Authentic Islamic Education For Every Age & Level', null, 'Our comprehensive Islamic curriculum is carefully designed for every age — from beginners learning the Arabic alphabet to advanced Hifz students completing the entire Quran. All courses are taught by certified scholars using modern and traditional teaching methods.', null, null, null, 2],
            ['courses', 'grid_title', 'All Available Courses', null, null, null, null, null, 3],

            // === GALLERY PAGE ===
            ['gallery', 'hero', 'Academy Gallery', 'Cherished moments from our classes, ceremonies, and community events.', null, null, null, null, 1],

            // === TEAM PAGE ===
            ['team', 'hero', 'Our Teachers', null, null, null, null, null, 1],
            ['team', 'section_title', 'Meet Our Qualified & Dedicated Instructors', null, 'Our teachers are certified scholars and experienced educators committed to delivering authentic Islamic education with care and excellence.', null, null, null, 2],

            // === OUR-TEAM PAGE ===
            ['our-team', 'hero', 'Meet Our Dedicated Team', null, null, null, null, null, 1],
            ['our-team', 'section_title', 'Meet Our Dedicated Team', 'Our team of qualified scholars and experienced educators is committed to delivering authentic Islamic education with care, excellence, and devotion.', null, null, null, null, 2],

            // === CONTACT PAGE ===
            ['contact', 'section_title', 'Have a Question? We\'re Here', null, 'Fill the form and our team will respond within 24 hours, In sha Allah.', null, null, null, 1],

            // === PRICING PAGE ===
            ['pricing', 'hero_title', 'Choose Your Learning Plan', null, 'All plans are 30-minute live one-on-one sessions via Microsoft Teams. Every plan includes a 3-day free trial.', null, null, null, 1],

            // === FREE TRIAL PAGE ===
            ['free-trial', 'hero_title', 'Book Your FREE Trial Today', null, 'Live one-on-one classes via Microsoft Teams. Certified scholars. Female teachers available. Completely free for 3 days.', null, null, null, 1],

            // === PRIVACY PAGE ===
            ['privacy-policy', 'subtitle', 'Your trust is our amanah. Here\'s how we protect your information.', null, null, null, null, null, 1],

            // === FOOTER ===
            ['footer', 'tagline', null, null, 'Our mission is to provide authentic Islamic education to Muslims worldwide, nurturing the next generation of believers with knowledge of the Quran and Sunnah.', null, null, null, 1],

            // === BLOG PAGE ===
            ['blog', 'page_title', 'Articles & Blog', null, null, null, null, null, 1],
        ];

        foreach ($sections as $item) {
            Section::updateOrCreate(
                ['page_name' => $item[0], 'section_key' => $item[1]],
                [
                    'title' => $item[2],
                    'subtitle' => $item[3],
                    'description' => $item[4],
                    'image' => $item[5],
                    'button_text' => $item[6],
                    'button_url' => $item[7],
                    'sort_order' => $item[8],
                    'is_active' => true,
                ]
            );
        }
    }
}
