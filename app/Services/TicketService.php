<?php

namespace App\Services;

use App\Enums\TicketStatus;
use App\Events\TicketOpened;
use App\Models\Ticket;
use App\Models\User;

class TicketService
{
    public function openTicket(array $formData, User $user): void
    {
        $ticket = Ticket::create([
            'subject' => $formData['subject'],
            'content' => $formData['content'],
            'status' => TicketStatus::OPEN,
            'user_id' => $user->id,
        ]);

        $ticket->categories()->attach($formData['categories']);

        TicketOpened::dispatch($ticket);
    }
}