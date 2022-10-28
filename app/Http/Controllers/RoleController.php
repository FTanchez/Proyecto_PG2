<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

use Auth;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        
        return view('roles.index', ["roles" => $roles]);
    }

    public function new()
    {
        return view('roles.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255']
        ]);

        $user = Role::create([
            'name' => strtoupper(trim($request->fullName)),
            'status' => true
        ]);

        return redirect("roles");
    }

    public function edit($id)
    {
        $role = Role::find($id);

        return view('roles.edit', ["role" => $role]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $user = Role::where("id", $request->id)->update([
            'name' => strtoupper(trim($request->fullName)),
        ]);

        return redirect("roles");
    }

    public function disabled(Request $request)
    {
        try {
            $user = Role::where("id", $request->id)->update([
                'status' => false
            ]);
    
            return response()->json(['ok' => true], 200);
        }catch(Exception $e) {
            return response()->json(['ok' => false], 500);
        }
    }
}
