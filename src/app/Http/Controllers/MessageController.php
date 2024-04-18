<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
class MessageController extends Controller
{
    //
    public function getMessages(Conversation $conversation)
    {
        $messages = $conversation->messages;

        return view('chat.messages' , compact('messages'));
    }
}
