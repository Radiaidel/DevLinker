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
}
