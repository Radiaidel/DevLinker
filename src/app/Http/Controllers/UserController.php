<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function searchUsers(Request $request)
    {
        $term = $request->input('term');

        // Effectuez votre logique de recherche ici et renvoyez les utilisateurs correspondants
        $users = User::where('name', 'like', '%' . $term . '%')->with('profile')->get();

        return response()->json($users);
    }
    public function blockUser(Request $request)
    {
        $userId = $request->input('user_id');
    
        // Rechercher l'utilisateur en incluant les utilisateurs soft deleted
        $user = User::withTrashed()->findOrFail($userId);
    
        // Vérifier si l'utilisateur n'est pas déjà supprimé
        if (!$user->trashed()) {
            // Effectuer la suppression logique
            $user->delete();
            return redirect()->back()->with('success', 'User blocked successfully.');
        }
    
        // Si l'utilisateur est déjà supprimé, restaurer l'utilisateur
        $user->restore();
        return redirect()->back()->with('success', 'User unblocked successfully.');
    }
}    
