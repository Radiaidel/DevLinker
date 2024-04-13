<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FriendRequest;
use App\Models\User;

class NetworkController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $sentRequests = $user->sentFriendRequests()->where('status', 'pending')->get();

        $receivedRequests = $user->receivedFriendRequests()->where('status', 'pending')->get();

        $acceptedRequests = FriendRequest::where('status', 'accepted')
            ->where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->orWhere('receiver_id', $user->id);
            })
            ->latest()
            ->limit(4)
            ->get();


        $relatedUserIds = $user->relatedUserIds();

        // Récupérer les utilisateurs qui ne sont pas dans la table friendrequests avec l'utilisateur authentifié
        $suggestedUsers = User::whereNotIn('id', $relatedUserIds)
            ->where('id', '!=', $user->id)
            ->limit(4)
            ->get();

        return view('network.index', compact('sentRequests', 'receivedRequests', 'acceptedRequests', 'suggestedUsers'));
    }
    public function accept(Request $request)
    {
        $friendRequest = FriendRequest::findOrFail($request->input('friendRequest_id'));

        $friendRequest->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Friend request accepted successfully.');
    }

    public function decline(Request $request)
    {
        $friendRequest = FriendRequest::findOrFail($request->input('friendRequest_id'));

        $friendRequest->update(['status' => 'declined']);

        return redirect()->back()->with('success', 'Friend request declined successfully.');
    }
    public function cancel(Request $request)
    {
        $friendRequestId = $request->input('friendRequest_id');

        $friendRequest = FriendRequest::find($friendRequestId);

        if ($friendRequest) {

            $friendRequest->delete();

            return redirect()->back()->with('success', 'Friend request cancelled successfully.');
        } else {

            return redirect()->back()->with('error', 'Friend request not found.');
        }
    }
    public function sendConnectionRequest(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Récupérer l'ID de l'utilisateur suggéré à connecter
        $suggestedUserId = $request->input('user_id');

  
            FriendRequest::create([
                'sender_id' => $user->id,
                'receiver_id' => $suggestedUserId,
                'status' => 'pending',
            ]);
        

        // Rediriger l'utilisateur vers la page précédente (ou une autre page de votre choix)
        return back()->with('success', 'Votre invitation a été envoyée avec succès');
        }
}
