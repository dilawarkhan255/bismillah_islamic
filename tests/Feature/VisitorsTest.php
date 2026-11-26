<?php

namespace Tests\Feature;

use App\Models\PageView;
use App\Models\User;
use App\Support\VisitTracker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class VisitorsTest extends TestCase
{
    use RefreshDatabase;

    private const PHONE = 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 Mobile/15E148 Safari/604.1';

    private function beacon(array $data, string $agent = self::PHONE)
    {
        return $this->withHeader('User-Agent', $agent)->post(route('visit.track'), $data);
    }

    public function test_a_visit_is_recorded_without_personal_data(): void
    {
        $this->beacon(['p' => '/free_trial', 'r' => 'https://www.google.com/', 'tz' => 'Europe/London'])->assertNoContent();

        $view = PageView::firstOrFail();
        $this->assertSame('/free_trial', $view->path);
        $this->assertSame('Google', $view->source);
        $this->assertSame('United Kingdom', $view->country);
        $this->assertSame('mobile', $view->device);
        $this->assertSame(64, strlen($view->visitor_hash));
        $this->assertStringNotContainsString('127.0.0.1', json_encode($view->getAttributes()));
    }

    public function test_private_links_bots_and_the_admin_are_not_recorded(): void
    {
        $this->beacon(['p' => '/progress/abcdefghijklmnopqrstuvwxyz123456', 'tz' => 'Asia/Karachi']);
        $this->assertSame('/progress/…', PageView::first()->path);

        $this->beacon(['p' => '/'], 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        $this->beacon(['p' => '/'], 'WhatsApp/2.23.20');
        $this->assertSame(1, PageView::count());

        Role::findOrCreate('admin');
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $this->actingAs($admin)->withHeader('User-Agent', self::PHONE)->post(route('visit.track'), ['p' => '/']);
        $this->assertSame(1, PageView::count());
    }

    public function test_sources_countries_and_devices(): void
    {
        $this->assertSame('Direct', VisitTracker::source('', 'bismillahislamicacademy.com', 'localhost'));
        $this->assertNull(VisitTracker::source('bismillahislamicacademy.com', 'bismillahislamicacademy.com', 'localhost'));
        $this->assertSame('Facebook', VisitTracker::source('l.facebook.com', null, 'localhost'));
        $this->assertSame('WhatsApp', VisitTracker::source('wa.me', null, 'localhost'));
        $this->assertSame('Other websites', VisitTracker::source('example.org', null, 'localhost'));

        $this->assertSame('USA', VisitTracker::country('America/Chicago'));
        $this->assertSame('Canada', VisitTracker::country('America/Toronto'));
        $this->assertSame('Australia', VisitTracker::country('Australia/Perth'));
        $this->assertNull(VisitTracker::country('not a zone'));

        $this->assertSame('desktop', VisitTracker::device('Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120'));
        $this->assertSame('tablet', VisitTracker::device('Mozilla/5.0 (iPad; CPU OS 17_0 like Mac OS X)'));
    }

    public function test_admin_sees_the_stats_others_do_not(): void
    {
        $this->beacon(['p' => '/', 'r' => '', 'tz' => 'Asia/Karachi']);
        $this->beacon(['p' => '/courses', 'r' => 'http://localhost/', 'tz' => 'Asia/Karachi']);

        Role::findOrCreate('admin');
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        foreach (['today', '7', '30', '365'] as $range) {
            $this->actingAs($admin)->get(route('admin.visitors.index', ['range' => $range]))
                ->assertOk()->assertSee('Pakistan')->assertSee('Courses');
        }

        $this->actingAs(User::factory()->create())->get(route('admin.visitors.index'))->assertForbidden();
    }
}
