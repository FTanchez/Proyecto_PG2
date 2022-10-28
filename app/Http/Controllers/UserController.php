<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use Auth;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userAuthRole = Auth::user()->role_id;

        if($userAuthRole) {
            $users = User::all();
        } else {
            $userAuthId = Auth::user()->id;

            $users = User::where('id', $userAuthId);
        }
        
        return view('users.index', ["users" => $users]);
    }

    public function new()
    {
        return view('users.new');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', ["user" => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
            'status' => true
        ]);

        return redirect("users");
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $user = User::where("id", $request->id)->update([
            'name' => $request->fullName,
            'role_id' => $request->role,
            'status' => true
        ]);

        return redirect("users");
    }

    public function disabled(Request $request)
    {
        try {
            $user = User::where("id", $request->id)->update([
                'status' => false
            ]);
    
            return response()->json(['ok' => true], 200);
        }catch(Exception $e) {
            return response()->json(['ok' => false], 500);
        }
    }
}