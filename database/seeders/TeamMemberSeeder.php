<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Mufti Ahmad Raza Khan',
                'slug' => 'mufti-ahmad-raza-khan',
                'role' => 'Director & Head Imam',
                'department' => 'Administration',
                'short_bio' => 'Founder and director of Bismillah Islamic Academy with over 20 years of experience in Islamic education.',
                'bio' => 'Mufti Ahmad Raza Khan is the founder and director of Bismillah Islamic Academy. With over 20 years of dedicated service in Islamic education, he has guided thousands of students in Quran recitation, Tajweed, and Islamic studies. He holds an Ijazah in Qira\'at and has studied under renowned scholars in Saudi Arabia and Pakistan. His vision is to make quality Islamic education accessible to every Muslim household.',
                'qualifications' => 'Ijazah in Qira\'at, Darul Uloom Karachi, Al-Azhar University (Visiting Scholar)',
                'experience' => '20+ years in Islamic Education, Founded 3 Islamic Academies',
                'email' => 'mufti@bismillahacademy.com',
                'phone' => '+92 314 1833216',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Ustadha Fatima Begum',
                'slug' => 'ustadha-fatima-begum',
                'role' => 'Head of Women\'s Education',
                'department' => 'Women\'s Department',
                'short_bio' => 'Leading women\'s Islamic education with passion and dedication for over 15 years.',
                'bio' => 'Ustadha Fatima Begum leads the women\'s education department at Bismillah Islamic Academy. She specializes in teaching Quran to women and children, with a focus on Tajweed and Hifz. She has memorized the Quran and holds a degree in Islamic Studies from the International Islamic University. Her warm teaching style and patience make her a beloved teacher among students.',
                'qualifications' => 'Hafiza, M.A. Islamic Studies, certified Tajweed instructor',
                'experience' => '15+ years teaching Quran to women and children',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Qari Muhammad Usman',
                'slug' => 'qari-muhammad-usman',
                'role' => 'Quran Recitation Expert',
                'department' => 'Quran Department',
                'short_bio' => 'Award-winning Qari with mastery in all 10 Qira\'at styles.',
                'bio' => 'Qari Muhammad Usman is a world-renowned Quran reciter and teacher at Bismillah Islamic Academy. He has won multiple international Quran recitation competitions and holds Ijazah in all 10 Qira\'at styles from Egypt. He has produced over 50 students who have memorized the entire Quran. His recitations are followed by millions worldwide.',
                'qualifications' => 'Ijazah in 10 Qira\'at, Winner of International Quran Competition 2018',
                'experience' => '18 years of teaching Quran recitation, 50+ Hafiz produced',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Abdullah Shah',
                'slug' => 'dr-abdullah-shah',
                'role' => 'Islamic Studies Instructor',
                'department' => 'Islamic Studies',
                'short_bio' => 'PhD in Islamic Jurisprudence, specializing in comparative Fiqh studies.',
                'bio' => 'Dr. Abdullah Shah brings academic rigor to Islamic education at Bismillah Academy. With a PhD in Islamic Jurisprudence from Al-Madinah International University, he teaches Fiqh, Seerah, and Islamic History. His research on comparative Fiqh has been published in several academic journals. He is passionate about making Islamic knowledge accessible through modern teaching methods.',
                'qualifications' => 'PhD Islamic Jurisprudence, M.A. Arabic Language, Published Researcher',
                'experience' => '12 years in Islamic academia and teaching',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Sheikh Omar Hassan',
                'slug' => 'sheikh-omar-hassan',
                'role' => 'Arabic Language Specialist',
                'department' => 'Arabic Department',
                'short_bio' => 'Native Arabic speaker dedicated to teaching classical and modern Arabic.',
                'bio' => 'Sheikh Omar Hassan is a native Arabic speaker from Egypt who has dedicated his life to teaching Arabic language at Bismillah Islamic Academy. He holds a degree from Al-Azhar University and specializes in classical Arabic grammar (Nahw) and morphology (Sarf). His innovative teaching methods combine traditional Arabic grammar with modern linguistic approaches.',
                'qualifications' => 'B.A. Arabic Language, Al-Azhar University, Certified Arabic Teacher',
                'experience' => '10 years teaching Arabic to non-native speakers',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($members as $data) {
            TeamMember::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
