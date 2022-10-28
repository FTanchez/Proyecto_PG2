<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketLearn;


class PluginController extends Controller
{
    //
    function list() {
        $learn = TicketLearn::list();
        return view('learn.index', ['learn' => $learn]);
    }
}
