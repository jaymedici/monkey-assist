<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;

class AllTicketsByUser extends Component
{
    use WithPagination;

    public function render()
    {
        $tickets = auth()->user()->paginateAllTickets(10);
        
        return view('livewire.user.all-tickets-by-user', [
            'tickets' => $tickets,
        ]);
    }
}
