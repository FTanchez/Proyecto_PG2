<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseLineTicket extends Model
{
    use HasFactory;

    protected $table = 'baseline_ticket';

    protected $fillable = [
        'plugin_id',
        'asigned_date',
        'severity_id',
        'ip',
        'port',
        'dns',
        'plugin_output',
        'maker_solution',
        'state_id',
        'user_id',
        'authorized',
        'execute_id',
        'solution',
        'rollback',
        'solution_date',
        'status'
    ];
}
