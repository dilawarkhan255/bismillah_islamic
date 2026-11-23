<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Teacher;
use App\Models\TeamMember;
use App\Support\ContentCache;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /** /sitemap.xml: every public page, article and profile, for Google. */
    public function sitemap(): Response
    {
        $xml = ContentCache::remember('seo.sitemap', function () {
            $urls = [];
            $add = function (string $loc, $lastmod = null, string $priority = '0.6') use (&$urls) {
                $urls[] = compact('loc', 'lastmod', 'priority');
            };

            $add(route('home'), null, '1.0');
            foreach (['courses', 'free_trial', 'pricing', 'about', 'team', 'blog', 'gallery', 'contact'] as $name) {
                $add(route($name), null, in_array($name, ['courses', 'free_trial'], true) ? '0.9' : '0.7');
            }
            if (TeamMember::active()->exists()) {
                $add(route('our-team'));
            }
            $add(route('qaida'), null, '0.8');
            $add(route('privacy_policy'), null, '0.3');

            foreach (BlogPost::active()->get(['slug', 'updated_at']) as $post) {
                $add(route('blog.show', $post->slug), $post->updated_at, '0.6');
            }
            foreach (Teacher::active()->get(['id', 'updated_at']) as $teacher) {
                $add(route('teacher.profile', $teacher), $teacher->updated_at, '0.5');
            }
            foreach (TeamMember::active()->get() as $member) {
                $add(route('team-member.profile', $member), $member->updated_at, '0.4');
            }

            return view('seo.sitemap', ['urls' => $urls])->render();
        });

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    /** /robots.txt: allow the site, keep the admin panel out, point to the sitemap. */
    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Disallow: /admin',
            'Disallow: /dashboard',
            'Disallow: /profile',
            '',
            'Sitemap: ' . route('sitemap'),
        ];

        return response(implode("\n", $lines) . "\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
