<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketEvent extends Model
{
    use HasFactory;

    public $fillable = [
        'ticket_id',
        'event',
        'event_date',
    ];
}
