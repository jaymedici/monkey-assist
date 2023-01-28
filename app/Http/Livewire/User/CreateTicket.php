<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreateTicket extends Component
{
    public $showCreateTicketModal = false;
    public Collection $categories;

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
        $this->categories = Category::all();

        return view('livewire.user.create-ticket');
    }
}
