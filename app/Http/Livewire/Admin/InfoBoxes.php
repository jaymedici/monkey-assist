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

        return view('livewire.admin.info-boxes', [
            'openTicketsCount' => $openTicketsCount,
            'usersCount' => $usersCount,
        ]);
    }
}
