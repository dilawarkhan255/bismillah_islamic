<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ChatbotTest extends TestCase
{
    use RefreshDatabase;

    public function test_default_questions_show_in_the_chatbot(): void
    {
        $this->assertSame(10, Faq::count()); // added by the migration

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('id="chatbot"', false)
            ->assertSee('Do you have female teachers?');
    }

    public function test_admin_manages_questions_and_hidden_ones_disappear(): void
    {
        Role::findOrCreate('admin');
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $this->actingAs($admin)->get(route('admin.faqs.index'))->assertOk();
        $this->actingAs($admin)->post(route('admin.faqs.store'), [
            'question' => 'Do you teach on weekends?', 'answer' => 'Yes, Saturday and Sunday too.',
            'keywords' => 'weekend, saturday, sunday', 'is_active' => 1,
        ])->assertRedirect(route('admin.faqs.index'));

        $faq = Faq::where('question', 'Do you teach on weekends?')->firstOrFail();
        $this->get(route('about'))->assertSee('Do you teach on weekends?');

        $this->actingAs($admin)->put(route('admin.faqs.update', $faq), [
            'question' => $faq->question, 'answer' => $faq->answer, // is_active left out = hidden
        ]);
        auth()->logout();
        $this->get(route('about'))->assertDontSee('Do you teach on weekends?');

        $this->actingAs(User::factory()->create())->get(route('admin.faqs.index'))->assertForbidden();
    }
}
