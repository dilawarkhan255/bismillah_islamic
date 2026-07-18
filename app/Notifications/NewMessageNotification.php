<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable): array
    {
        return [
            'type'       => 'new_message',
            'title'      => 'New Contact Message',
            'message'    => "{$this->message->name} sent a message: {$this->message->inquiry}",
            'url'        => route('admin.messages.show', $this->message->id),
            'created_at' => now()->toISOString(),
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Message — ' . $this->message->name)
            ->line('Name: ' . $this->message->name)
            ->line('Email: ' . $this->message->email)
            ->line('Subject: ' . $this->message->inquiry)
            ->line('Message: ' . Str::limit($this->message->message, 200))
            ->action('View Message', route('admin.messages.show', $this->message->id));
    }
}
