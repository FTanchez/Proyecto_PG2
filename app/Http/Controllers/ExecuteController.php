<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Execute;

class ExecuteController extends Controller
{
    public function index()
    {
        $roles = Execute::all();
        
        return view('execute.index', ["roles" => $roles]);
    }

    public function new()
    {
        return view('execute.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $user = Execute::create([
            'name' => trim($request->fullName),
            'status' => true,
        ]);

        return redirect("execute");
    }

    public function edit($id)
    {
        $role = Execute::find($id);

        return view('execute.edit', ["role" => $role]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $user = Execute::where("id", $request->id)->update([
            'name' => trim($request->fullName)
        ]);

        return redirect("execute");
    }

    public function disabled(Request $request)
    {
        try {
            $user = Execute::where("id", $request->id)->update([
                'status' => false
            ]);
    
            return response()->json(['ok' => true], 200);
        }catch(Exception $e) {
            return response()->json(['ok' => false], 500);
        }
    }
}
