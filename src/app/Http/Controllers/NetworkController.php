<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FriendRequest;

class NetworkController extends Controller
{
    //
    public function index()
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Récupérer les invitations en attente envoyées par l'utilisateur
        $sentRequests = $user->sentFriendRequests()->where('status', 'pending')->get();

        // Récupérer les invitations en attente reçues par l'utilisateur
        $receivedRequests = $user->receivedFriendRequests()->where('status', 'pending')->get();

        $acceptedRequests = FriendRequest::where('status', 'accepted')
            ->where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->orWhere('receiver_id', $user->id);
            })
            ->latest()
            ->limit(4)
            ->get();

        // Passez les invitations à la vue
        return view('network.index', compact('sentRequests', 'receivedRequests', 'acceptedRequests'));
    }
    public function accept(Request $request)
    {
        // Trouver la demande d'ami correspondante
        $friendRequest = FriendRequest::findOrFail($request->input('friendRequest_id'));

        // Mettre à jour le statut de la demande d'ami à "accepted"
        $friendRequest->update(['status' => 'accepted']);

        // Rediriger l'utilisateur vers une autre page ou une vue
        return redirect()->back()->with('success', 'Friend request accepted successfully.');
    }

    public function decline(Request $request)
    {
        // Trouver la demande d'ami correspondante
        $friendRequest = FriendRequest::findOrFail($request->input('friendRequest_id'));

        // Mettre à jour le statut de la demande d'ami à "declined"
        $friendRequest->update(['status' => 'declined']);

        // Rediriger l'utilisateur vers une autre page ou une vue
        return redirect()->back()->with('success', 'Friend request declined successfully.');
    }
    public function cancel(Request $request)
    {
        // Récupérer l'ID de la demande d'ami à annuler
        $friendRequestId = $request->input('friendRequest_id');

        // Rechercher la demande d'ami dans la base de données
        $friendRequest = FriendRequest::find($friendRequestId);

        // Vérifier si la demande d'ami existe
        if ($friendRequest) {
            // Supprimer la demande d'ami de la base de données
            $friendRequest->delete();

            // Rediriger l'utilisateur vers une page appropriée (par exemple, la page de profil)
            return redirect()->back()->with('success', 'Friend request cancelled successfully.');
        } else {
            // Si la demande d'ami n'existe pas, rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Friend request not found.');
        }
    }
}
