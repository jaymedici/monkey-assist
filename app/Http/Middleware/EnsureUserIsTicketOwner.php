<?php

namespace App\Http\Middleware;

use App\Models\Ticket;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsTicketOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ticket = Ticket::findOrFail($request->ticket);

        // If the user is an admin, they can view any ticket
        if (auth()->user()->hasRole('Admin'))
        {
            return $next($request);
        }

        // If the user is not an admin, and not the owner of the ticket, they cannot view it
        if (auth()->user()->id !== $ticket->user_id)
        {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
