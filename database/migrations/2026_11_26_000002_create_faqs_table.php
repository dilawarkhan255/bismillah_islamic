<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Questions and answers for the website chatbot (Admin > Chatbot FAQs).
 * Starts with the questions parents ask most; every answer can be edited.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('keywords')->nullable();     // extra words people type, e.g. "fee, price, kitni"
            $table->string('button_text')->nullable();  // optional link under the answer
            $table->string('button_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $now = now();
        $rows = [
            ['How do the free trial classes work?',
             'You get 3 free live one-on-one classes with a qualified teacher. No payment and no commitment. Pick a time that suits you on the Free Trial page and we will confirm it on WhatsApp within 24 hours, In sha Allah.',
             'trial, free, demo, test class, muft, try', 'Book a free trial', '/free_trial'],
            ['What are the fees?',
             'Fees depend on the plan and how many classes a week you choose. You can see our plans on the Pricing page, or message us on WhatsApp and we will suggest the best plan for your child.',
             'fee, fees, price, cost, charges, monthly, payment, kitni, paisay, rate', 'See pricing', '/pricing'],
            ['Do you have female teachers?',
             'Yes. We have qualified female teachers for sisters and young children. Just choose "Female Teacher" when you book your free trial.',
             'female, lady, woman, sister, ustadha, aurat, khatoon, teacher gender', 'Book with a female teacher', '/free_trial'],
            ['What are your class timings?',
             'We teach Monday to Saturday with timings for the UK, USA, Pakistan and other countries. When you book a free trial, the times are shown in your own time zone so you can pick what suits you.',
             'time, timing, timings, schedule, hours, when, uk time, usa time, waqt, kab', 'Pick a time', '/free_trial'],
            ['How are the classes taught?',
             'Classes are live and one-on-one on Microsoft Teams. Your child sees and hears the teacher, who corrects pronunciation in real time. You only need a phone, tablet or computer with internet.',
             'online, teams, zoom, how, live, one on one, skype, video, kaise'],
            ['Which courses do you offer?',
             'Norani Qaida, Quran Recitation (Nazra), Tajweed, Hifz ul Quran, Islamic Studies, Arabic Language, Hadith & Seerah, Namaz & Ibadat, and Dua & Azkar.',
             'course, courses, subject, qaida, nazra, tajweed, hifz, arabic, islamic studies, kya parhate', 'View all courses', '/courses'],
            ['What age can students start?',
             'Children can start from 4 years old, and adults of any age are very welcome. The teacher adjusts the lessons to the student\'s age and level.',
             'age, old, kid, child, children, adult, umar, saal, bacha'],
            ['Can I choose or change the class time?',
             'Yes. You choose the days and time that suit your family, and if your routine changes later we can move the class to a new time.',
             'change, reschedule, miss, missed, flexible, holiday, chutti, badalna'],
            ['How do I enroll?',
             'Start with the 3 free trial classes. After the trial, choose a plan and we will fix your regular class times. You can also press "Enroll Now" at the top of any page.',
             'enroll, enrol, admission, join, register, start, sign up, dakhla, dakhila', 'Book a free trial', '/free_trial'],
            ['How can I contact you?',
             'The quickest way is WhatsApp (the green button on this page). You can also use the Contact page and we reply within 24 hours, In sha Allah.',
             'contact, whatsapp, phone, call, email, number, talk, rabta', 'Contact us', '/contact'],
        ];

        DB::table('faqs')->insert(array_map(fn ($r, $i) => [
            'question' => $r[0], 'answer' => $r[1], 'keywords' => $r[2],
            'button_text' => $r[3] ?? null, 'button_url' => $r[4] ?? null,
            'sort_order' => $i + 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now,
        ], $rows, array_keys($rows)));
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
