<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TicketImport;
use Maatwebsite\Excel\Facades\Excel;

class TicketController extends Controller
{
    //
    public function import()
    {
        return view('importer.import');
    }

    public function store(Request $request)
    {
        Excel::import(new TicketImport, $request->file("file"));

        // $request->validate([
        //     'fullName' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->fullName,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role_id' => $request->role,
        //     'status' => true
        // ]);

        // return redirect("users");
    }

}
