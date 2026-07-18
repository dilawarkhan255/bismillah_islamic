<?php

namespace App\Events;

use App\Models\FreeTrial;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewFreeTrialEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public FreeTrial $freeTrial;

    public function __construct(FreeTrial $freeTrial)
    {
        $this->freeTrial = $freeTrial;
    }

    public function broadcastOn(): array
    {
        return [new PrivateChannel('admin.notifications')];
    }

    public function broadcastAs(): string
    {
        return 'new.free_trial';
    }

    public function broadcastWith(): array
    {
        return [
            'id'         => $this->freeTrial->id,
            'name'       => $this->freeTrial->student_name,
            'course'     => $this->freeTrial->course,
            'created_at' => $this->freeTrial->created_at->format('Y-m-d H:i:s'),
            'url'        => route('admin.free-trials.index'),
        ];
    }
}
