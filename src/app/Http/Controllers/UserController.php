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

        $users = User::where('name', 'like', '%' . $term . '%')->with('profile')->get();

        return response()->json($users);
    }
    public function blockUser(Request $request)
    {
        $userId = $request->input('user_id');
    
        $user = User::withTrashed()->findOrFail($userId);
    
        if (!$user->trashed()) {
            $user->delete();
            return redirect()->back()->with('success', 'User blocked successfully.');
        }
    
        $user->restore();
        return redirect()->back()->with('success', 'User unblocked successfully.');
    }
}    
