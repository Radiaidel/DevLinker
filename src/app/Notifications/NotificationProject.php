<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationProject extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $project_id;
    public $user_id;
    public $type;

    public function __construct($projectId , $userId , $Type )
    {
        //
        $this->project_id=$projectId;
        $this->user_id=$userId;
        $this->type=$Type;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
            'project_id' =>$this->project_id,
            'user_id'=> $this->user_id,
            'type'=> $this->type
        ];
    }


    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'project_id' =>$this->project_id,
            'user_id'=> $this->user_id,
            'type'=> $this->type
        ]);
    }

}
