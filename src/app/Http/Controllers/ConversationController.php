<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

class ConversationController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
    
        // Récupérer les conversations de l'utilisateur avec la date du dernier message envoyé
        $conversations = $user->conversations()
        ->select('conversations.*')
        ->selectRaw('(SELECT MAX(created_at) FROM messages WHERE messages.conversation_id = conversations.id) AS last_message_date')
        ->selectRaw('(SELECT COUNT(*) FROM messages WHERE messages.conversation_id = conversations.id AND messages.sender_id != ? AND messages.read_at IS NULL) AS unread_count', [$user->id])
        ->orderByDesc('last_message_date') // Triez les conversations par la date du dernier message
        ->with('messages', 'user', 'friend')
        ->get();
    
        return view('chat.index', compact('conversations'));
    }
    
    
    public function getUserConversations()
    {
        $user = auth()->user();
        $conversations = $user->conversations()->with('messages', 'user', 'friend')->get();

        return response()->json($conversations);
    }
}
