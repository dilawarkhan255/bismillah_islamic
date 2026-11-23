<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * "We received your request" email sent to the visitor after the enroll,
 * free trial and contact forms. Replies go to the academy's admin inbox.
 */
class VisitorConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    private const TYPES = [
        'enrollment' => [
            'subject' => 'We received your enrollment request',
            'heading' => 'Enrollment request received',
            'intro'   => 'Thank you for choosing Bismillah Islamic Academy. We have received your enrollment request.',
            'next'    => 'Our team will contact you within 24 hours, In sha Allah, to confirm the class timing and teacher.',
        ],
        'free_trial' => [
            'subject' => 'Your free trial request is booked',
            'heading' => 'Free trial request received',
            'intro'   => 'Thank you for booking a free trial class with Bismillah Islamic Academy.',
            'next'    => 'We will message you on WhatsApp within 24 hours, In sha Allah, to confirm your trial time.',
        ],
        'contact' => [
            'subject' => 'We received your message',
            'heading' => 'Message received',
            'intro'   => 'Thank you for contacting Bismillah Islamic Academy. We have received your message.',
            'next'    => 'We will reply within 24 hours, In sha Allah.',
        ],
    ];

    /**
     * @param  string  $type     enrollment | free_trial | contact
     * @param  string  $name     who to greet
     * @param  array   $details  label => value rows summarising what they sent
     */
    public function __construct(
        public string $type,
        public string $name,
        public array $details = [],
    ) {}

    public function envelope(): Envelope
    {
        $replyTo = config('services.email.admin_email');

        return new Envelope(
            subject: self::TYPES[$this->type]['subject'] . ' — Bismillah Islamic Academy',
            replyTo: $replyTo ? [new Address($replyTo, 'Bismillah Islamic Academy')] : [],
        );
    }

    public function content(): Content
    {
        $whatsapp = preg_replace('/\D+/', '', (string) setting('whatsapp_float', '923141833216'));

        return new Content(
            view: 'emails.visitor-confirmation',
            with: self::TYPES[$this->type] + [
                'name'     => $this->name,
                'details'  => array_filter($this->details, fn ($v) => filled($v)),
                'whatsapp' => $whatsapp,
            ],
        );
    }
}
