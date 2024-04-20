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

        // Récupérer les conversations de l'utilisateur avec leurs messages
        $sentConversations = $user->sentConversations()->with('messages')->get();
        $receivedConversations = $user->receivedConversations()->with('messages')->get();

        // Fusionner les collections de conversations
        $conversations = $sentConversations->merge($receivedConversations);

        return view('chat.index', compact('conversations'));
    }
    public function getUserConversations()
    {
        $user = auth()->user();
        $sentConversations = $user->sentConversations()->with('messages')->get();
        $receivedConversations = $user->receivedConversations()->with('messages')->get();

        // Fusionner les collections de conversations
        $conversations = $sentConversations->merge($receivedConversations);
        return response()->json($conversations);
    }
}
