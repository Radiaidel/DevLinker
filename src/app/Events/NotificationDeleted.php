<?php
namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\PrivateChannel;

class NotificationDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function broadcastOn()//retourne le canal privé sur lequel l'evenement sera diffusé
    {
        return new PrivateChannel('notifications.'.$this->userId);
    }
    

    public function broadcastAs()//retourne le nom de l'evenement à diffuser
    {
        return 'notification.deleted';
    }
}
