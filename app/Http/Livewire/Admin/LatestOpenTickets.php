<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;

class LatestOpenTickets extends Component
{
    public function render()
    {
        $tickets = Ticket::latestOpen(5)->get();

        return view('livewire.admin.latest-open-tickets', [
            'tickets' => $tickets,
        ]);
    }
}
