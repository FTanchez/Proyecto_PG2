<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    //
    public function index()
    {
        $roles = State::all();
        
        return view('states.index', ["roles" => $roles]);
    }

    public function new()
    {
        return view('states.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $user = State::create([
            'name' => trim($request->fullName),
            'status' => true,
        ]);

        return redirect("states");
    }

    public function edit($id)
    {
        $role = State::find($id);

        return view('states.edit', ["role" => $role]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $user = State::where("id", $request->id)->update([
            'name' => trim($request->fullName)
        ]);

        return redirect("states");
    }

    public function disabled(Request $request)
    {
        try {
            $user = State::where("id", $request->id)->update([
                'status' => false
            ]);
    
            return response()->json(['ok' => true], 200);
        }catch(Exception $e) {
            return response()->json(['ok' => false], 500);
        }
    }
}
