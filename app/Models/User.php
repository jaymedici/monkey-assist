<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

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

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function getOpenTicketsCountAttribute(): int
    {
        return $this->tickets()->open()->get()->count();
    }

    public function getClosedTicketsCountAttribute(): int
    {
        return $this->tickets()->closed()->get()->count();
    }

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
