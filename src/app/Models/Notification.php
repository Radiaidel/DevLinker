<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\BroadcastsPrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;

class Notification extends Model
{
    use HasFactory , BroadcastsEvents ;
    protected $fillable = [
        'type', 'project_id', 'user_id', 'data'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Get the project associated with the notification.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user associated with the notification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
