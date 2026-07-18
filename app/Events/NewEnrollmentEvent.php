<?php

namespace App\Events;

use App\Models\Enrollment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewEnrollmentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Enrollment $enrollment;

    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function broadcastOn(): array
    {
        return [new PrivateChannel('admin.notifications')];
    }

    public function broadcastAs(): string
    {
        return 'new.enrollment';
    }

    public function broadcastWith(): array
    {
        return [
            'id'         => $this->enrollment->id,
            'name'       => $this->enrollment->student_name,
            'course'     => $this->enrollment->course,
            'created_at' => $this->enrollment->created_at->format('Y-m-d H:i:s'),
            'url'        => route('admin.enrollments.index'),
        ];
    }
}
