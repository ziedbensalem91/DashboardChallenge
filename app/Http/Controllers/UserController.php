<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
        $roles = Role::all();
        $selectedRole = User::first()->role_id;
        return view('users', compact('roles', 'selectedRole'));
    }


    public function changeRole(Request $request, $id)
    {
        // error_log('Some message here.');
        // $event = User::table('user')->get();
        // $evt = $event->id;



        //     $user = new User();
        //     $user->user_id = $user->id;
        //     $user->event_id = $evt;
        //     $user->save();

        //     return view('user',compact('$user','event'));
        //     }
        $role = User::where('role','=',$request->input('role'))->first();
        $user = User::find($id);
        $user->role = $role;
        $user->save();

       return back()->with('flash', 'role is geupdate');
    }


}
