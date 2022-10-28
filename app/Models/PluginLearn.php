<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PluginLearn extends Model
{
    use HasFactory;

    protected $table = 'plugin_learn';
    
    protected $fillable = [
        'plugin_id',
        'solution',
        'rollback',
        'status'
    ];

    protected static function get($pluginId) {
        $table = 'plugin';
        $users = DB::table($table)
            ->select(DB::raw("
                plugin.id as plugin_id,
                plugin_learn.id as plugin_learn_id,
                plugin_learn.solution,
                plugin_learn.rollback,
                plugin_learn.created_at as created_at
            "))
            ->join('plugin_learn', 'plugin_learn.plugin_id', '=', "$table.id")
            ->where('plugin.idp', '=', $pluginId)
            // ->groupBy('vulnerability_ticket.id')
            // ->orderBy('vulnerability_ticket.id', 'desc')
            ->get();
        
        return $users;
    }
}
