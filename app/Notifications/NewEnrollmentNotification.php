<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewEnrollmentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $enrollment;

    public function __construct($enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable): array
    {
        return [
            'type'       => 'new_enrollment',
            'title'      => 'New Enrollment Request',
            'message'    => "{$this->enrollment->student_name} enrolled for {$this->enrollment->course}",
            'url'        => route('admin.enrollments.index'),
            'created_at' => now()->toISOString(),
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Enrollment Request — ' . $this->enrollment->student_name)
            ->line('Student: ' . $this->enrollment->student_name)
            ->line('Parent: ' . $this->enrollment->parent_name)
            ->line('Course: ' . $this->enrollment->course)
            ->line('Phone: ' . $this->enrollment->phone)
            ->action('View Enrollment', route('admin.enrollments.index'));
    }
}
