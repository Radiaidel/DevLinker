<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Conversation;


class ConversationController extends Controller
{
    //

    public function index()
    {
        $user =User::find(auth()->user()->id);
    
        // Récupérer les conversations de l'utilisateur avec la date du dernier message envoyé
        $conversations = $user->conversations()
        ->select('conversations.*')
        ->selectRaw('(SELECT MAX(created_at) FROM messages WHERE messages.conversation_id = conversations.id) AS last_message_date')
        ->selectRaw('(SELECT COUNT(*) FROM messages WHERE messages.conversation_id = conversations.id AND messages.sender_id != ? AND messages.read_at IS NULL) AS unread_count', [$user->id])
        ->orderByDesc('last_message_date') 
        ->with('messages', 'user', 'friend')
        ->get();
    
        return view('chat.index', compact('conversations'));
    }
    
    
    public function getUserConversations()
    {
        $user =User::find(auth()->user()->id);
        $conversations = $user->conversations()->with('messages', 'user', 'friend')->get();

        return response()->json($conversations);
    }
}
