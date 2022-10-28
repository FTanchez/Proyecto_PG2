<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketLog extends Model
{
    use HasFactory;

    protected $table = 'ticket_log';

    protected $fillable = [
        'ticket_id',
        'user_id',
        'state_id',
        'status'
    ];
}
