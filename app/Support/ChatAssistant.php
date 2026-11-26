<?php

namespace App\Support;

use Anthropic\Client;
use Anthropic\Core\Exceptions\APIConnectionException;
use Anthropic\Core\Exceptions\APIStatusException;
use App\Models\Course;
use App\Models\Faq;
use RuntimeException;

/**
 * AI answers for the website chatbot, using only the academy's own information
 * (courses, Chatbot FAQs, timings, contact). Hands over to WhatsApp when a person
 * is needed. The system prompt is built once and cached so repeat questions are cheap.
 */
class ChatAssistant
{
    /** The model adds this when the visitor should talk to the team on WhatsApp. */
    public const HANDOFF_TAG = '[WHATSAPP]';

    public static function enabled(): bool
    {
        return filled(config('services.anthropic.key'));
    }

    /**
     * @param  array<int, array{role: string, content: string}>  $history  oldest first, ends with the visitor's message
     * @return array{reply: string, whatsapp: bool}
     *
     * @throws RuntimeException when the AI can't answer (the chatbot then falls back to the FAQs)
     */
    public function reply(array $history): array
    {
        $client = new Client(apiKey: config('services.anthropic.key'));

        try {
            $message = $client->beta->messages->create(
                model: config('services.anthropic.model'),
                maxTokens: 4096,
                system: [
                    ['type' => 'text', 'text' => self::systemPrompt(), 'cacheControl' => ['type' => 'ephemeral']],
                ],
                messages: $history,
                outputConfig: ['effort' => 'low'],      // short website chat: quick, inexpensive answers
                fallbacks: 'default',                   // if the model declines, another model answers
                betas: ['server-side-fallback-2026-07-01'],
            );
        } catch (APIStatusException|APIConnectionException $e) {
            report($e);
            throw new RuntimeException('Chat service unavailable', previous: $e);
        }

        if ($message->stopReason === 'refusal') {
            return ['reply' => "Sorry, I can't help with that here. Our team will gladly answer on WhatsApp.", 'whatsapp' => true];
        }

        $text = '';
        foreach ($message->content as $block) {
            if ($block->type === 'text') {
                $text .= $block->text;
            }
        }

        $whatsapp = str_contains($text, self::HANDOFF_TAG);
        $text = trim(str_replace(self::HANDOFF_TAG, '', $text));
        if ($text === '') {
            throw new RuntimeException('Empty answer');
        }

        return ['reply' => $text, 'whatsapp' => $whatsapp];
    }

    /** Built from the site's data; cached until content changes so the prompt prefix stays identical. */
    public static function systemPrompt(): string
    {
        return ContentCache::remember('chatbot.system', function () {
            $courses = Course::active()->pluck('title')->implode(', ');
            $faqs = Faq::active()->get()->map(fn ($f) => "Q: {$f->question}\nA: {$f->answer}")->implode("\n\n");
            $hours = trim(html_entity_decode(strip_tags((string) setting('class_hours', 'Mon–Sat')), ENT_QUOTES | ENT_HTML5));
            $hours = trim(preg_replace('/\s+/u', ' ', $hours));
            $phones = collect([setting('phone'), setting('phone_uk')])->filter()->implode(', ');
            $email = setting('email');
            $url = rtrim(config('app.url'), '/');
            $tag = self::HANDOFF_TAG;

            return <<<PROMPT
            You are the website assistant of Bismillah Islamic Academy, an online Quran and Islamic studies academy.
            You chat with parents and students who visit the website ({$url}).

            How to answer:
            - Reply in the visitor's language: English, Urdu, or Roman Urdu (Urdu written in English letters).
            - Keep answers short and warm: 2 to 4 sentences, plain text, no markdown headings or tables.
            - Use only the academy information below. Never invent fees, prices, discounts, teacher names, dates or phone numbers.
            - If you don't know, or the visitor wants exact fees, a specific class time, to enroll, to speak to a person,
              or anything about their own child's classes, say the team will help on WhatsApp and add {$tag} at the very end.
            - Point to pages by name when useful: Free Trial (/free_trial), Pricing (/pricing), Courses (/courses), Contact (/contact).
            - Stay on topic: the academy, its classes, and general encouragement about learning the Quran.
              For religious rulings (fatwa) or anything unrelated, politely say a teacher can help and add {$tag}.

            Academy information:
            - Classes: live one-on-one online classes on Microsoft Teams with qualified male and female teachers.
            - Free trial: 3 free classes, no payment and no commitment. Book on the Free Trial page.
            - Courses: {$courses}.
            - Class days and hours: {$hours}. Timings available for the UK, USA, Pakistan and other countries.
            - Contact: WhatsApp {$phones}; email {$email}.

            Frequently asked questions (the academy's own answers):
            {$faqs}
            PROMPT;
        });
    }
}
