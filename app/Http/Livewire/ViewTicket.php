<?php

namespace App\Http\Livewire;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use Livewire\Component;

class ViewTicket extends Component
{
    public $ticket;
    public $comment;

    protected $listeners = [
        'ticket-status-updated' => '$refresh',
        'comment-added' => '$refresh',
    ];

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function closeTicket()
    {
        $this->ticket->status = TicketStatus::CLOSED;
        $this->ticket->save();

        $this->emit('ticket-status-updated');
        $this->dispatchBrowserEvent('ticket-status-updated', [
            'message' => 'Ticket Closed'
        ]);
    }

    public function reopenTicket()
    {
        $this->ticket->status = TicketStatus::OPEN;
        $this->ticket->save();

        $this->emit('ticket-status-updated');
        $this->dispatchBrowserEvent('ticket-status-updated', [
            'message' => 'Ticket Reopened'
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'comment' => 'required|max:500',
        ]);

        $this->ticket->comments()->create([
            'content' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        $this->comment = null;
        $this->emit('comment-added');
        $this->dispatchBrowserEvent('comment-added', [
            'message' => 'Comment Added'
        ]);
    }

    public function render()
    {
        return view('livewire.view-ticket');
    }
}
