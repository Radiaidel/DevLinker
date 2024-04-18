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
    
        $conversations = $user->conversations ;
    
        return view('chat.index', compact('conversations'));
    }
}
