<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Services\TicketService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateTicket extends Component
{
    public bool $showCreateTicketModal = false;
    public array $formData = [];
    public Collection $categories;

    public function openModal()
    {
        $this->showCreateTicketModal = true;
    }

    public function closeModal()
    {
        $this->showCreateTicketModal = false;
        $this->formData = [];
    }

    public function save(TicketService $service)
    {
        Validator::make($this->formData, [
            'subject' => ['required', 'string', 'max:255'],
            'categories' => ['nullable', 'array'],
            'content' => ['required', 'string', 'max:1000'],
        ])->validate();

        $service->openTicket($this->formData, auth()->user());
        
        $this->closeModal();
        $this->emit('ticket-opened');
        $this->dispatchBrowserEvent('ticket-opened', [
            'message' => 'Ticket Opened'
        ]);
    }

    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.user.create-ticket');
    }
}
