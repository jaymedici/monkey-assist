<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
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
                ->isoFormat('DD/MM/YYYY - h:mm a'),
        );
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    
    /**
     * Scope a query to search for a user by name or email.
     *
     * @param  Builder $query
     * @param  string $search
     * @return Builder
     */
    public function scopeSearch($query, $search): Builder
    {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%");
    }
    
    /**
     * Get the number of open tickets submitted by the user.
     *
     * @return int
     */
    public function getOpenTicketsCountAttribute(): int
    {
        return $this->tickets()->open()->get()->count();
    }
    
    /**
     * Get the number of closed tickets submitted by the user.
     *
     * @return int
     */
    public function getClosedTicketsCountAttribute(): int
    {
        return $this->tickets()->closed()->get()->count();
    }
    
    /**
     * Get the total number of tickets submitted by the user.
     *
     * @return int
     */
    public function getTicketsCountAttribute(): int
    {
        return $this->tickets()->get()->count();
    }
    
    /**
     * Get recent tickets specified by number of records.
     *
     * @param  int $records
     * @return Collection
     */
    public function getRecentTickets(int $records): Collection
    {
        return $this->tickets()->with('categories')
                    ->latest()->limit($records)->get();
    }
    
    /**
     * Get all tickets, paginated by number of records.
     *
     * @param  int $records
     * @return LengthAwarePaginator
     */
    public function paginateAllTickets(int $records): LengthAwarePaginator
    {
        return $this->tickets()->with('categories')
                    ->latest()->paginate($records);
    }
}
