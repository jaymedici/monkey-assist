<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class CreateTicket extends Component
{
    public $showCreateTicketModal = false;

    public function openModal()
    {
        $this->showCreateTicketModal = true;
    }

    public function closeModal()
    {
        $this->showCreateTicketModal = false;
    }

    public function render()
    {
        return view('livewire.user.create-ticket');
    }
}
