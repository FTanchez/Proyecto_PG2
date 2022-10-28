<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Severity;

class SeverityController extends Controller
{
    //
    public function index()
    {
        $roles = Severity::all();
        
        return view('severity.index', ["roles" => $roles]);
    }

    public function new()
    {
        return view('severity.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $baseLine = false;
        if($request->has("baseline")){
            $baseLine = true;
        }

        $user = Severity::create([
            'name' => trim($request->fullName),
            'status' => true,
            'baseline' => $baseLine 
        ]);

        return redirect("severity");
    }

    public function edit($id)
    {
        $role = Severity::find($id);

        return view('severity.edit', ["role" => $role]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $baseLine = false;
        if($request->has("baseline")){
            $baseLine = true;
        }

        $user = Severity::where("id", $request->id)->update([
            'name' => trim($request->fullName),
            'baseline' => $baseLine
        ]);

        return redirect("severity");
    }

    public function disabled(Request $request)
    {
        try {
            $user = Severity::where("id", $request->id)->update([
                'status' => false
            ]);
    
            return response()->json(['ok' => true], 200);
        }catch(Exception $e) {
            return response()->json(['ok' => false], 500);
        }
    }
}
