<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class RecentTickets extends Component
{
    protected $listeners = ['ticket-opened' => 'render'];

    public function render()
    {
        $recentTickets = auth()->user()->getRecentTickets(5);

        return view('livewire.user.recent-tickets', [
            'recentTickets' => $recentTickets,
        ]);
    }
}
