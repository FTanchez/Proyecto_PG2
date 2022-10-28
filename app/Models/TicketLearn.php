<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TicketLearn extends Model
{
    use HasFactory;

    protected $table = 'ticket_learn';
    
    protected $fillable = [
        'plugin_learn_id',
        'ticket_id',
        'status'
    ];

    protected static function list() {
        $table = 'plugin';

        $users = DB::table($table)
            ->select(DB::raw("
                plugin.id as plugin_id,
                plugin.idp as plugin_idp,
                plugin.name as plugin_name,
                plugin.ticket_type_id as ticket_type_id,
                operating_system.name as osm,
                plugin_learn.solution,
                plugin_learn.rollback
            "))
            ->join('plugin_learn', 'plugin_learn.plugin_id', '=', "$table.id")
            ->join('operating_system', 'plugin.operating_system_id', '=', "operating_system.id")
            ->get();
    
        return $users;
    }
}
