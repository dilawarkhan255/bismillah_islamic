<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        // ╔══════════════════════════════════════════════════════════════╗
        // ║  HOME PAGE                                                  ║
        // ╚══════════════════════════════════════════════════════════════╝

        // Stats Section — title=label, description=number, subtitle=icon
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'stats_1'],
            ['title' => 'Years Experience', 'description' => '10', 'subtitle' => 'fa fa-certificate', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'stats_2'],
            ['title' => 'Qualified Teachers', 'description' => '25', 'subtitle' => 'fa fa-users-cog', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'stats_3'],
            ['title' => 'Satisfied Students', 'description' => '1500', 'subtitle' => 'fa fa-users', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'stats_4'],
            ['title' => 'Hafiz Graduates', 'description' => '500', 'subtitle' => 'fa fa-book-open', 'sort_order' => 4, 'is_active' => true]
        );

        // Why Choose Us — skills
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'skills'],
            ['title' => 'Quran & Tajweed,Islamic Studies,Arabic Language,Hifz Program', 'description' => '99,99,99,99', 'sort_order' => 5, 'is_active' => true]
        );

        // Courses button
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'courses_btn'],
            ['title' => 'View All Courses', 'button_url' => '/courses', 'sort_order' => 6, 'is_active' => true]
        );

        // Free Trial Features — title=name, description=desc, subtitle=icon
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'trial_feat_1'],
            ['title' => 'One-on-One Session', 'description' => 'Personal attention from a certified Quran teacher.', 'subtitle' => 'fa-user-graduate', 'sort_order' => 7, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'trial_feat_2'],
            ['title' => 'Flexible Timing', 'description' => 'Choose class time that suits your schedule.', 'subtitle' => 'fa-clock', 'sort_order' => 8, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'trial_feat_3'],
            ['title' => 'No Commitment', 'description' => 'Cancel anytime — zero pressure, zero cost.', 'subtitle' => 'fa-shield-alt', 'sort_order' => 9, 'is_active' => true]
        );

        // How It Works — 5 steps: title=step title, description=step desc, subtitle=icon
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'step_1'],
            ['title' => 'Register Online', 'description' => 'Fill out our simple enrollment form and create your student account in minutes.', 'subtitle' => 'fa-user-plus', 'sort_order' => 10, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'step_2'],
            ['title' => 'Book Free Trial', 'description' => 'Schedule a free trial session with a qualified teacher at your preferred time.', 'subtitle' => 'fa-calendar-check', 'sort_order' => 11, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'step_3'],
            ['title' => 'Choose Your Course', 'description' => 'Pick from Norani Qaida, Tajweed, Hifz, Islamic Studies, Arabic & more.', 'subtitle' => 'fa-book-open', 'sort_order' => 12, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'step_4'],
            ['title' => 'Start Learning', 'description' => 'Attend live one-on-one classes via Microsoft Teams — our primary online classroom platform.', 'subtitle' => 'fa-chalkboard-teacher', 'sort_order' => 13, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'step_5'],
            ['title' => 'Get Certified', 'description' => 'Earn an official certificate from Bismillah Islamic Academy upon completion.', 'subtitle' => 'fa-certificate', 'sort_order' => 14, 'is_active' => true]
        );

        // Learning Journey — 5 items: title=item title, description=item desc, subtitle=icon
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'journey_1'],
            ['title' => 'Free Trial', 'description' => 'Start your journey risk-free', 'subtitle' => 'fa-graduation-cap', 'sort_order' => 15, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'journey_2'],
            ['title' => 'Norani Qaida', 'description' => 'Build strong foundations', 'subtitle' => 'fa-book-open', 'sort_order' => 16, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'journey_3'],
            ['title' => 'Quran Reading', 'description' => 'Read fluently with confidence', 'subtitle' => 'fa-quran', 'sort_order' => 17, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'journey_4'],
            ['title' => 'Tajweed', 'description' => 'Perfect your pronunciation', 'subtitle' => 'fa-microphone', 'sort_order' => 18, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'journey_5'],
            ['title' => 'Hifz ul Quran', 'description' => 'Achieve mastery & memorization', 'subtitle' => 'fa-trophy', 'sort_order' => 19, 'is_active' => true]
        );

        // Ayah Banner
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'ayah'],
            ['title' => 'اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ', 'subtitle' => '"Read in the name of your Lord who created"', 'description' => 'Surah Al-Alaq · 96:1 · First Revelation of the Holy Quran', 'sort_order' => 20, 'is_active' => true]
        );

        // Countries Strip
        Section::updateOrCreate(
            ['page_name' => 'home', 'section_key' => 'countries'],
            ['title' => 'Trusted by families across', 'description' => 'Pakistan,United Kingdom,United States,Canada,Australia,Saudi Arabia,UAE', 'sort_order' => 21, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  ABOUT PAGE                                                  ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'cert_title'],
            ['title' => 'Accreditation & Certifications', 'description' => 'Our teachers are certified by recognized Islamic institutions — ensuring every lesson meets the highest standards of authenticity.', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'cert_1'],
            ['title' => 'Ijazah in Quran Recitation', 'description' => 'All our Quran teachers hold a certified Ijazah — an unbroken chain of authorization tracing back to the Prophet ﷺ — guaranteeing authentic transmission of the Quran.', 'subtitle' => 'Verified Ijazah', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'cert_2'],
            ['title' => 'Wafaq ul Madaris Certified', 'description' => 'Our scholars are graduates of Wafaq ul Madaris Al-Arabia — Pakistan\'s largest and most respected Islamic seminary board — ensuring rigorous academic standards.', 'subtitle' => 'Wafaq ul Madaris', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'cert_3'],
            ['title' => 'International Teaching Standard', 'description' => 'Our online teaching methodology follows internationally recognized standards for Islamic e-learning — with structured lesson plans, progress tracking, and regular assessments.', 'subtitle' => 'ISO Compliant', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'trust_badges'],
            ['title' => '500+ Hafiz Graduates,1500+ Active Students,25+ Certified Scholars,Students in 15+ Countries,10 Years of Excellence', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'cta'],
            ['title' => 'Ready to Begin Your Islamic Journey?', 'description' => 'Enroll today and give your child the gift of the Quran, authentic Deen, and lifelong Islamic knowledge. Seats are limited — join our growing family of 1,500+ students.', 'button_text' => 'Enroll Now', 'button_url' => '/contact', 'sort_order' => 6, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'story_2026'],
            ['title' => '1500+ Students Strong', 'description' => 'Today, Bismillah Islamic Academy proudly serves over 1,500 students globally with 25+ certified teachers, 9 structured courses, and hundreds of Hafiz graduates. The journey continues — with Allah\'s blessing.', 'sort_order' => 12, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  CONTACT PAGE                                                ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'info_location'],
            ['title' => 'Our Location', 'description' => 'JWFX+4HV, Jhangi Sayedan, Islamabad, Pakistan', 'subtitle' => 'fa-map-marker-alt', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'info_phone'],
            ['title' => 'Call Us', 'description' => '+92 314 1833216', 'subtitle' => 'fa-phone-alt', 'button_text' => 'Mon – Sat, 6:00 PM – 4:00 AM', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'info_email'],
            ['title' => 'Email Us', 'description' => 'bismillahquranacademy2@gmail.com', 'subtitle' => 'fa-envelope', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'form_header'],
            ['title' => 'Have a Question?', 'subtitle' => 'Send A Message', 'description' => 'Fill in the form below and our team will respond within 24 hours, In sha Allah.', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'hours'],
            ['title' => 'Class Hours', 'description' => 'Monday – Saturday|6:00 PM – 4:00 AM,Sunday|Off,Online Classes|By Appointment', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'social'],
            ['title' => 'Connect With Us', 'description' => 'Facebook|https://www.facebook.com/share/1JPSiUdTG3/?mibextid=wwXIfr|fa-facebook-f,Instagram|https://www.instagram.com/bismillahislamicacademy?igsh=OWxiZHZwc2l5aXd6&utm_source=qr|fa-instagram,WhatsApp|https://wa.me/923141833216|fa-whatsapp', 'sort_order' => 6, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  GALLERY PAGE                                                ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'gallery', 'section_key' => 'section_title'],
            ['title' => 'Glimpses of Our Academy', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'gallery', 'section_key' => 'cta'],
            ['title' => 'Be Part Of Our Growing Community', 'description' => 'Join Bismillah Islamic Academy and create your own beautiful memories on the path of Quranic knowledge.', 'button_text' => 'Enroll Now', 'button_url' => '/free-trial', 'sort_order' => 2, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  BLOG PAGE                                                   ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'blog', 'section_key' => 'page_title'],
            ['title' => 'Articles & Blog', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'blog', 'section_key' => 'latest_title'],
            ['title' => 'Latest Articles', 'description' => 'Islamic Knowledge', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'blog', 'section_key' => 'verse'],
            ['title' => 'اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ', 'subtitle' => '"Read in the name of your Lord who created"', 'description' => 'Surah Al-Alaq — 96:1', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'blog', 'section_key' => 'widget_categories'],
            ['title' => 'Categories', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'blog', 'section_key' => 'widget_recent'],
            ['title' => 'Recent Articles', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'blog', 'section_key' => 'cta'],
            ['title' => 'Begin Your Journey', 'description' => 'Join Bismillah Islamic Academy and walk the path of Quranic excellence today.', 'button_text' => 'Enroll Now', 'button_url' => '/free-trial', 'sort_order' => 6, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  PRICING PAGE                                                ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'hero_eyebrow'],
            ['title' => 'Transparent Pricing', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'trust_badges'],
            ['title' => '3-Day Free Trial,One-on-One Classes,Female Teachers Available,Cancel Anytime', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'compare_title'],
            ['title' => 'Full Plan Comparison', 'description' => 'Side by Side', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'compare_rows'],
            ['title' => 'Days per Week|3 days|5 days|6 days,Class Duration|30 min|30 min|30 min,Classes per Month|12|20|24,Courses|1|2|All,Progress Report|Monthly|Weekly|Weekly,Parent-Teacher Call||Monthly|Weekly,Certificate||✓|✓,Makeup Classes|✓|✓|Priority,Female Teacher|✓|✓|✓,WhatsApp Support|✓|✓|Dedicated,Free Trial|✓|✓|✓', 'description' => 'Days per Week,Class Duration,Classes per Month,Courses,Progress Report,Parent-Teacher Call,Certificate,Makeup Classes,Female Teacher,WhatsApp Support,Free Trial', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'courses_title'],
            ['title' => 'All Available Courses', 'description' => 'What We Teach', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'courses_list'],
            ['title' => 'fa-book|Norani Qaida|For complete beginners & young children,fa-quran|Quran Recitation (Nazra)|Learn to read the Holy Quran correctly,fa-microphone|Tajweed ul Quran|Rules of beautiful Quranic recitation,fa-star|Hifz ul Quran|Complete Quran memorisation programme,fa-mosque|Islamic Studies|Aqeedah, Fiqh, Seerah & Islamic manners,fa-language|Arabic Language|Classical Arabic to understand the Quran,fa-scroll|Hadith & Seerah|40 Hadith Nawawi & Prophet\'s ﷺ life,fa-hands|Namaz & Ibadat|Correct method of Salah & worship', 'sort_order' => 6, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'bottom_note'],
            ['title' => 'Fees are discussed and confirmed via WhatsApp after your free trial. No upfront payment.', 'sort_order' => 7, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'pricing', 'section_key' => 'cta'],
            ['title' => 'Try 3 Classes Completely Free', 'description' => 'No payment. No commitment. Just 3 live classes with a certified teacher.', 'button_text' => 'Book Free Trial', 'button_url' => '/free-trial', 'sort_order' => 8, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  FREE TRIAL PAGE                                             ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'hero_badges'],
            ['title' => '100% Free,No Credit Card,No Commitment,Female Teachers Available', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'step_1'],
            ['title' => 'Book Your Slot', 'description' => 'Send a WhatsApp message or fill the form below. We reply within 2 hours to confirm your trial time.', 'subtitle' => 'fab fa-whatsapp', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'step_2'],
            ['title' => 'Attend 3 Free Classes', 'description' => 'Join live one-on-one sessions via Microsoft Teams. Your teacher assesses your level and guides you personally.', 'subtitle' => 'fas fa-laptop', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'step_3'],
            ['title' => 'Choose a Plan', 'description' => 'After the trial, select Plan A, B or C based on your schedule. No pressure — completely your choice.', 'subtitle' => 'fas fa-graduation-cap', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'sidebar_title'],
            ['title' => 'Book Your FREE Trial', 'description' => 'Fill the form and we\'ll contact you within 2 hours to confirm your slot. Or reach us directly:', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'whatsapp_pk'],
            ['title' => 'WhatsApp — Pakistan', 'description' => '+92 314 1833216', 'button_url' => 'https://wa.me/923141833216?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial', 'sort_order' => 6, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'whatsapp_uk'],
            ['title' => 'WhatsApp — United Kingdom', 'description' => '+44 7415 770822', 'button_url' => 'https://wa.me/447415770822?text=Assalamu+Alaikum,+I+want+to+book+a+free+trial', 'sort_order' => 7, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'email_contact'],
            ['title' => 'Email Us', 'description' => 'bismillahquranacademy2@gmail.com', 'button_url' => 'mailto:bismillahquranacademy2@gmail.com', 'sort_order' => 8, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'free-trial', 'section_key' => 'class_hours'],
            ['title' => 'Class Hours', 'description' => '🇵🇰 Pakistan: 6:00 PM – 3:00 AM,🇬🇧 UK: 2:00 PM – 11:00 PM', 'button_text' => 'Monday – Saturday (Sunday Off)', 'sort_order' => 9, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  TEAM PAGE                                                   ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'team', 'section_key' => 'cta'],
            ['title' => 'Learn From The Best Scholars', 'description' => 'Enroll today and study under our qualified teachers — dedicated to guiding every student on the path of Quran and Sunnah.', 'button_text' => 'Enroll Now', 'button_url' => '/contact', 'sort_order' => 1, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  OUR TEAM PAGE                                               ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'our-team', 'section_key' => 'cta'],
            ['title' => 'Learn From The Best Scholars', 'description' => 'Enroll today and study under our qualified teachers — dedicated to guiding every student on the path of Quran and Sunnah.', 'button_text' => 'Enroll Now', 'button_url' => '/contact', 'sort_order' => 1, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  PRIVACY POLICY PAGE                                          ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'subtitle'],
            ['title' => 'Your trust is our amanah. Here\'s how we protect your information.', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'commitment'],
            ['title' => 'Our Commitment', 'description' => 'Bismillah Islamic Academy collects only what is needed to serve you. We never sell your data, never run ads, and always handle your information with amanah and wudhuh.', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_1'],
            ['title' => 'Introduction', 'description' => '<p>This policy covers all services by Bismillah Islamic Academy — our website, enrollment forms, WhatsApp, and Google Meet classes — for students and families in Pakistan, the UK, and beyond.</p><p>By enrolling or using our website you agree to this policy.</p>', 'subtitle' => 'fa-info-circle', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_2'],
            ['title' => 'Information We Collect', 'description' => '<p>We collect only what is necessary:</p><div class="pp-chips"><span><i class="fas fa-user"></i> Student & parent name</span><span><i class="fas fa-envelope"></i> Email & WhatsApp number</span><span><i class="fas fa-globe"></i> Country & time zone</span><span><i class="fas fa-graduation-cap"></i> Quran level & goals</span><span><i class="fas fa-chart-line"></i> Progress reports</span><span><i class="fas fa-laptop"></i> Basic device & browser data</span></div>', 'subtitle' => 'fa-database', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_3'],
            ['title' => 'How We Use It', 'description' => '<ul class="pp-list"><li>Enroll students and assign qualified teachers</li><li>Schedule classes in your time zone</li><li>Send reminders, progress updates, and announcements</li><li>Respond to inquiries and support requests</li><li>Process payments where applicable</li><li>Improve our courses and website</li></ul><div class="pp-callout"><i class="fas fa-ban"></i><p>We will <strong>never</strong> sell your data or use it for unsolicited marketing.</p></div>', 'subtitle' => 'fa-cogs', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_4'],
            ['title' => 'Data Sharing', 'description' => '<p>We share your data only when necessary:</p><div class="pp-share-list"><div class="pp-share-item"><strong>Assigned Teachers</strong><span>To prepare and conduct lessons — need-to-know only</span></div><div class="pp-share-item"><strong>WhatsApp / Google Meet</strong><span>Class sessions — protected by platform encryption</span></div><div class="pp-share-item"><strong>Payment Processors</strong><span>Fee collection — PCI-DSS compliant only</span></div><div class="pp-share-item"><strong>Legal Authorities</strong><span>Only if required by law</span></div></div>', 'subtitle' => 'fa-share-alt', 'sort_order' => 6, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_5'],
            ['title' => 'Data Security', 'description' => '<div class="pp-sec-grid"><div class="pp-sec-item"><i class="fas fa-lock"></i><div><strong>Encrypted Storage</strong><p>Sensitive data is encrypted; passwords never stored in plain text.</p></div></div><div class="pp-sec-item"><i class="fas fa-user-lock"></i><div><strong>Access Control</strong><p>Only authorized staff can access student records.</p></div></div><div class="pp-sec-item"><i class="fas fa-shield-virus"></i><div><strong>Secure Comms</strong><p>HTTPS on website; encrypted messaging for all communications.</p></div></div><div class="pp-sec-item"><i class="fas fa-trash-alt"></i><div><strong>Data Minimization</strong><p>We delete data when it is no longer needed.</p></div></div></div>', 'subtitle' => 'fa-lock', 'sort_order' => 7, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_6'],
            ['title' => 'Cookies', 'description' => '<div class="pp-cookie-list"><div class="pp-cookie-item"><span class="pp-badge-req">Required</span><strong>Essential</strong><p>Core website functions — cannot be disabled.</p></div><div class="pp-cookie-item"><span class="pp-badge-opt">Optional</span><strong>Analytics</strong><p>Google Analytics — helps us improve the site.</p></div><div class="pp-cookie-item"><span class="pp-badge-opt">Optional</span><strong>Preferences</strong><p>Remembers language and region settings.</p></div></div><p style="margin-top:14px;font-size:13px;">You can manage cookies in your browser settings.</p>', 'subtitle' => 'fa-cookie-bite', 'sort_order' => 8, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_7'],
            ['title' => 'Your Rights', 'description' => '<div class="pp-rights"><div><i class="fas fa-eye"></i> <strong>Access</strong> — request a copy of your data</div><div><i class="fas fa-edit"></i> <strong>Rectification</strong> — correct inaccurate information</div><div><i class="fas fa-trash"></i> <strong>Erasure</strong> — request deletion of your data</div><div><i class="fas fa-download"></i> <strong>Portability</strong> — receive your data in a readable format</div><div><i class="fas fa-times-circle"></i> <strong>Object</strong> — object to certain types of processing</div></div><div class="pp-callout" style="margin-top:18px;"><i class="fas fa-envelope"></i><p>Email <a href="mailto:bismillahquranacademy2@gmail.com">bismillahquranacademy2@gmail.com</a> to exercise any right. We respond within 24 hours.</p></div>', 'subtitle' => 'fa-balance-scale', 'sort_order' => 9, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_8'],
            ['title' => "Children's Privacy", 'description' => '<div class="pp-callout pp-callout--green"><i class="fas fa-child"></i><p><strong>Special Protection for Minors.</strong> All enrollment and communication for children is handled through a parent or legal guardian. We collect only the minimum data needed, never serve ads to minors, and never share their data beyond what is described in Section 4. Parents may request access, correction, or deletion of their child\'s data at any time.</p></div>', 'subtitle' => 'fa-child', 'sort_order' => 10, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_9'],
            ['title' => 'Policy Changes', 'description' => '<p>When we make significant changes, we will update the date on this page, notify enrolled families via email or WhatsApp, and post a notice on our homepage for 30 days.</p>', 'subtitle' => 'fa-sync-alt', 'sort_order' => 11, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'section_10'],
            ['title' => 'Contact Us', 'description' => '<div class="pp-contacts"><a href="mailto:bismillahquranacademy2@gmail.com" class="pp-contact"><div class="pp-ci"><i class="fas fa-envelope"></i></div><div><strong>Email</strong><span>bismillahquranacademy2@gmail.com</span></div></a><a href="https://wa.me/923141833216" class="pp-contact" target="_blank"><div class="pp-ci pp-ci--wa"><i class="fab fa-whatsapp"></i></div><div><strong>Pakistan</strong><span>+92 314 1833216</span></div></a><a href="https://wa.me/447415770822" class="pp-contact" target="_blank"><div class="pp-ci pp-ci--uk"><i class="fab fa-whatsapp"></i></div><div><strong>United Kingdom</strong><span>+44 7415 770822</span></div></a></div>', 'subtitle' => 'fa-headset', 'sort_order' => 12, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'privacy-policy', 'section_key' => 'cta'],
            ['title' => 'Begin Your Quranic Journey', 'description' => 'Your privacy is protected. Your trust is our amanah.', 'button_text' => 'Start Free Trial', 'button_url' => '/free-trial', 'sort_order' => 13, 'is_active' => true]
        );


        // ╔══════════════════════════════════════════════════════════════╗
        // ║  FOOTER                                                      ║
        // ╚══════════════════════════════════════════════════════════════╝

        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'address'],
            ['title' => 'Address', 'description' => 'JWFX+4HV, Jhangi Sayedan, Islamabad, Pakistan', 'subtitle' => 'fa-map-marker-alt', 'sort_order' => 1, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'phone_pk'],
            ['title' => 'WhatsApp — Pakistan', 'description' => '+92 314 1833216', 'button_url' => 'https://wa.me/923141833216', 'subtitle' => 'fab fa-whatsapp', 'sort_order' => 2, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'phone_uk'],
            ['title' => 'WhatsApp — United Kingdom', 'description' => '+44 7415 770822', 'button_url' => 'https://wa.me/447415770822', 'subtitle' => 'fab fa-whatsapp', 'sort_order' => 3, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'email'],
            ['title' => 'Email', 'description' => 'bismillahquranacademy2@gmail.com', 'button_url' => 'mailto:bismillahquranacademy2@gmail.com', 'subtitle' => 'fa-envelope', 'sort_order' => 4, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'social'],
            ['title' => 'Social Links', 'description' => 'Facebook|https://www.facebook.com/share/1JPSiUdTG3/?mibextid=wwXIfr|fa-facebook-f,Instagram|https://www.instagram.com/bismillahislamicacademy?igsh=OWxiZHZwc2l5aXd6&utm_source=qr|fa-instagram,YouTube||fa-youtube', 'sort_order' => 5, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'newsletter'],
            ['title' => 'Newsletter', 'description' => 'Subscribe to receive updates on new courses and Islamic events.', 'button_text' => 'Enroll Now', 'button_url' => '#enrollModal', 'sort_order' => 6, 'is_active' => true]
        );
        Section::updateOrCreate(
            ['page_name' => 'footer', 'section_key' => 'copyright'],
            ['title' => '© 2026 Bismillah Islamic Academy. All Rights Reserved.', 'sort_order' => 7, 'is_active' => true]
        );
    }
}
