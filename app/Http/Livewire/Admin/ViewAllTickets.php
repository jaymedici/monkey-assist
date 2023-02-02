<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllTickets extends Component
{
    use WithPagination;

    public $search = '';
    public $sortDirection = 'desc';
    public $status = '';

    public function changeSortDirection()
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        $tickets = Ticket::search($this->search)
                        ->where('status', 'like', "%{$this->status}%")
                        ->orderBy('created_at', $this->sortDirection)
                        ->paginate(10);

        return view('livewire.admin.view-all-tickets', [
            'tickets' => $tickets,
        ]);
    }
}
