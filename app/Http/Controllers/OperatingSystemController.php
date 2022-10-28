<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use Illuminate\Support\Str;

use Auth;


class OperatingSystemController extends Controller
{
    //
    public function index()
    {
        $roles = OperatingSystem::all();
        
        return view('os.index', ["roles" => $roles]);
    }

    public function new()
    {
        return view('os.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255']
        ]);

        $osName = trim($request->fullName);
        $osSlug = Str::slug($osName, "-");

        $count = OperatingSystem::where("slug", $osSlug)->count();
        
        if($count == 0) {
             $user = OperatingSystem::create([
                'name' => strtoupper($osName),
                "slug" => $osSlug,
                'status' => true
            ]);

            return redirect("os");
        } else {
            return back()->withErrors(['Sistema operativo ya se encuentra registrado.']);
        }
    }

    public function edit($id)
    {
        $role = OperatingSystem::find($id);

        return view('os.edit', ["role" => $role]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
        ]);

        $osName = trim($request->fullName);
        $osSlug = Str::slug($osName, "-");

        $os = OperatingSystem::where("id", $request->id)->update([
            'name' => strtoupper($osName),
            'slug' => $osSlug,
        ]);

        return redirect("os");
    }

    public function disabled(Request $request)
    {
        try {
            $user = OperatingSystem::where("id", $request->id)->delete();
    
            return response()->json(['ok' => true], 200);
        }catch(Exception $e) {
            return response()->json(['ok' => false], 500);
        }
    }
}
