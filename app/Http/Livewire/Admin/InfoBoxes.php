<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class InfoBoxes extends Component
{
    public function render()
    {
        $openTicketsCount = Ticket::open()->get()->count();
        $usersCount = User::all()->count();
        $timeTakenToClose = [];

        $randomClosedTickets = Ticket::closed()->take(200)->get()->random(20);

        foreach ($randomClosedTickets as $ticket) {
            $timeTakenToClose[] = $ticket->getTimeTakenToClose();
        }

        $avgClosingTime = ceil(array_sum($timeTakenToClose) / count($timeTakenToClose));

        return view('livewire.admin.info-boxes', [
            'openTicketsCount' => $openTicketsCount,
            'usersCount' => $usersCount,
            'avgClosingTime' => $avgClosingTime,
        ]);
    }
}
