<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class TicketSummary extends Component
{
    protected $listeners = ['ticket-opened' => 'render'];

    public function render()
    {
        return view('livewire.user.ticket-summary', [
            'openTicketsCount' => auth()->user()->openTicketsCount,
            'closedTicketsCount' => auth()->user()->closedTicketsCount,
            'totalTicketsCount' => auth()->user()->ticketsCount,
        ]);
    }
}
