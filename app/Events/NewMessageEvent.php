<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class NewMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn(): array
    {
        return [new PrivateChannel('admin.notifications')];
    }

    public function broadcastAs(): string
    {
        return 'new.message';
    }

    public function broadcastWith(): array
    {
        return [
            'id'         => $this->message->id,
            'name'       => $this->message->name,
            'email'      => $this->message->email,
            'subject'    => $this->message->inquiry,
            'preview'    => Str::limit($this->message->message, 100),
            'created_at' => $this->message->created_at->format('Y-m-d H:i:s'),
            'url'        => route('admin.messages.show', $this->message->id),
        ];
    }
}
