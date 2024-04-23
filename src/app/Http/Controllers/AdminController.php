<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
       

        return view('admin.dashboard');
    }

    public function getUsers(){
        $users = User::withTrashed()->get();
                return view('admin.users' , compact('users'));
    }

}
