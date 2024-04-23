<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Conversation;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('notifications.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});


Broadcast::channel('conversation.{conversationId}', function ($user, $conversationId) {
   $conversation = Conversation::findOrFail($conversationId);
    return $user->id == $conversation->user_id || $user->id == $conversation->friend_id;
});      

Broadcast::channel('admin-reports.{userId}', function ($user, $userId) {
    return $user->id === (int) $userId ;
});

