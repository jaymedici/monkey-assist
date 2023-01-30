<?php

namespace App\Models;

use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'content',
        'status',
        'priority',
        'user_id',
    ];

    protected $casts = [
        'status' => TicketStatus::class,
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
