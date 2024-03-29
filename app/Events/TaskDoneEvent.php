<?php

namespace App\Events;

use App\Models\Task;
use App\Services\GoogleSheetsService;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskDoneEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**}
     * Create a new event instance.
     */
    public function __construct(public Task $task)
    {

    }
}
