<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'phone_pakistan',        'value' => '+92 314 1833216'],
            ['key' => 'phone_uk',               'value' => '+44 7415 770822'],
            ['key' => 'phone_usa',              'value' => '+1 (929) 597-8179'],
            ['key' => 'phone',                  'value' => '+1 (929) 597-8179'],
            ['key' => 'email',                  'value' => 'bismillahquranacademy2@gmail.com'],
            ['key' => 'address',                'value' => 'JWFX+4HV, Jhangi Sayedan, Islamabad, Pakistan'],
            ['key' => 'facebook',               'value' => 'https://www.facebook.com/share/1JPSiUdTG3/?mibextid=wwXIfr'],
            ['key' => 'facebook_url',           'value' => 'https://www.facebook.com/share/1JPSiUdTG3/?mibextid=wwXIfr'],
            ['key' => 'instagram',              'value' => 'https://www.instagram.com/bismillahislamicacademy?igsh=OWxiZHZwc2l5aXd6&utm_source=qr'],
            ['key' => 'instagram_url',          'value' => 'https://www.instagram.com/bismillahislamicacademy?igsh=OWxiZHZwc2l5aXd6&utm_source=qr'],
            ['key' => 'youtube',                'value' => ''],
            ['key' => 'whatsapp',               'value' => '19295978179'],
            ['key' => 'whatsapp_pakistan',      'value' => '923141833216'],
            ['key' => 'whatsapp_uk',            'value' => '447415770822'],
            ['key' => 'site_name',              'value' => 'Bismillah Islamic Academy'],
            ['key' => 'class_hours',            'value' => 'Mon–Sat &nbsp;24/7 - Hours'],
            ['key' => 'class_hours_weekdays',   'value' => '6:00 PM – 4:00 AM'],
            ['key' => 'class_hours_sunday',     'value' => 'Off'],
            ['key' => 'google_maps',            'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.93719018323!2d72.94892000000002!3d33.6228671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df97ec9c5db731%3A0x41632ff4b234dc47!2sAllied%20Bank!5e1!3m2!1sen!2s!4v1773176142786!5m2!1sen!2s'],
            ['key' => 'meta_pixel_id',          'value' => '854559400712986'],
            ['key' => 'copyright',              'value' => 'Bismillah Islamic Academy, All Rights Reserved 2026'],
            ['key' => 'img_logo',               'value' => ''],
            ['key' => 'logo',                   'value' => 'img/logo.png'],
            ['key' => 'enroll_button_text',     'value' => 'Enroll Now'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'group' => 'general',
                ]
            );
        }
    }
}
