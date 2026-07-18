<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFreeTrialNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $freeTrial;

    public function __construct($freeTrial)
    {
        $this->freeTrial = $freeTrial;
    }

    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable): array
    {
        return [
            'type'       => 'new_free_trial',
            'title'      => 'New Free Trial Request',
            'message'    => "{$this->freeTrial->student_name} wants a free trial for {$this->freeTrial->course}",
            'url'        => route('admin.free-trials.index'),
            'created_at' => now()->toISOString(),
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Free Trial Request — ' . $this->freeTrial->student_name)
            ->line('Student: ' . $this->freeTrial->student_name)
            ->line('Parent: ' . $this->freeTrial->parent_name)
            ->line('Course: ' . $this->freeTrial->course)
            ->line('Country: ' . $this->freeTrial->country)
            ->action('View Request', route('admin.free-trials.index'));
    }
}
