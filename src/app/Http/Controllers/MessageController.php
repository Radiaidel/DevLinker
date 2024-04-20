<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    // //
    // public function getMessages(Conversation $conversation)
    // {
    //     $messages = $conversation->messages;

    //     return view('chat.messages', compact('messages', 'conversation'));
    // }


    public function getMessages(Request $request)
    {
        $conversationId = $request->input('conversation_id');

        $conversation_actuel = Conversation::findOrFail($conversationId);
        $messages = $conversation_actuel->messages;

        $user = Auth::user();

        $sentConversations = $user->sentConversations;
        $receivedConversations = $user->receivedConversations;

        // Fusionner les collections de conversations
        $conversations = $sentConversations->merge($receivedConversations);

        // Retourner les messages au format JSON
        return response()->json([
            'messages' => $messages,
            'conversation_actuel' => $conversation_actuel,
            'conversations' => $conversations
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'content' => 'required|string',
        ]);
        $conversation = Conversation::findOrFail($request->input('conversation_id'));

        $destinataireId = ($conversation->user_id == auth()->id()) ? $conversation->friend_id : $conversation->user_id;

        $message = new Message();
        $message->conversation_id = $conversation->id;
        $message->content = $request->input('content');
        $message->sender_id = auth()->id();
        $message->save();



        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['success' => true]);
    }
}
// broadcast(new NewMessage($message , $destinataireId))->toOthers();
