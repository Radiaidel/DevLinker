<?php

namespace App\Events;

use App\Models\Report;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectReported implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $report;
    public $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Report $report , $userId)
    {
        $this->report = $report;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Diffuser l'événement sur un canal privé spécifique pour les rapports
        return new PrivateChannel('admin-reports.'.$this->userId);
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */

    /**
     * Get the broadcast event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'report.created';
    }
}
