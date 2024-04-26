<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_online',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function saves()
    {
        return $this->hasMany(Save::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sentFriendrequests()
    {
        return $this->hasMany(Friendrequest::class, 'sender_id');
    }

    public function receivedFriendrequests()
    {
        return $this->hasMany(Friendrequest::class, 'receiver_id');
    }

    public function relatedUserIds()
    {
        $acceptedFriendIds = $this->sentFriendRequests()->where('status', 'accepted')->pluck('receiver_id')
            ->merge($this->receivedFriendRequests()->where('status', 'accepted')->pluck('sender_id'));

        return $acceptedFriendIds;
    }

    public function PendingRequests()
    {
        return   $this->sentFriendRequests()->where('status', 'pending')->pluck('receiver_id')
            ->merge($this->receivedFriendRequests()->where('status', 'pending')->pluck('sender_id'));
    }
    public function notification()
    {
        return $this->hasMany(Notification::class, 'notifiable_id');
    }

    public function sentConversations()
    {
        return $this->hasMany(Conversation::class, 'user_id');
    }

    public function receivedConversations()
    {
        return $this->hasMany(Conversation::class, 'friend_id');
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'user_id')->orWhere('friend_id', $this->id);
    }
    public function unreadMessagesCount()
    {
        // Récupérer les conversations de l'utilisateur avec les messages non lus
        $conversations = $this->conversations()->withCount(['messages' => function ($query) {
            $query->whereNull('read_at')->where('sender_id', '!=', $this->id);
        }])->get();

        $unreadMessagesCount = $conversations->sum('messages_count');

        return $unreadMessagesCount;
    }
}
