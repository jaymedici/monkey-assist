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
    }

    public function save()
    {
        Validator::make($this->formData, [
            'subject' => ['required', 'string', 'max:255'],
            'categories' => ['nullable', 'array'],
            'content' => ['required', 'string', 'max:1000'],
        ])->validate();

        $service = new TicketService();
        $service->openTicket($this->formData, auth()->user());
        
        $this->formData = [];
        $this->showCreateTicketModal = false;
    }

    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.user.create-ticket');
    }
}
