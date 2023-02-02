<?php

namespace App\Models;

use App\Enums\TicketEventType;
use Illuminate\Database\Eloquent\Builder;
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

    protected $casts = [
        'event_date' => 'datetime',
        'event' => TicketEventType::class,
    ];

    public function scopeOpened(Builder $query): Builder
    {
        return $query->where('event', TicketEventType::OPENED);
    }

    public function scopeClosed(Builder $query): Builder
    {
        return $query->where('event', TicketEventType::CLOSED);
    }

}
