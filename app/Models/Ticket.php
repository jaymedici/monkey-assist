<?php

namespace App\Models;

use App\Enums\TicketStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    
    /**
     * An accessor to format the created_at attribute.
     *
     * @return Attribute
     */
    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
                ->isoFormat('D/M/YY - h:mm a'),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    
    /**
     * Scope a query to only include open tickets.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeOpen($query): Builder
    {
        return $query->where('status', TicketStatus::OPEN);
    }
    
    /**
     * Scope a query to only include closed tickets.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeClosed($query): Builder
    {
        return $query->where('status', TicketStatus::CLOSED);
    }
    
    /**
     * Scope a query to only include latest open tickets 
     * specified by number of records.
     *
     * @param  Builder $query
     * @param  int $records
     * @return Builder
     */
    public function scopeLatestOpen($query, int $records): Builder
    {
        return $query->open()->latest()->take($records);
    }
    
    /**
     * Scope a query to only include include tickets that match search term.
     *
     * @param  Builder $query
     * @param  string $search
     * @return Builder
     */
    public function scopeSearch($query, string $search): Builder
    {
        return $query->where('subject', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%");
    }
    
}
