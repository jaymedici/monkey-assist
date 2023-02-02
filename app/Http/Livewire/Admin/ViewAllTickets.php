<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllTickets extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $tickets = Ticket::search($this->search)->paginate(10);

        return view('livewire.admin.view-all-tickets', [
            'tickets' => $tickets,
        ]);
    }
}
