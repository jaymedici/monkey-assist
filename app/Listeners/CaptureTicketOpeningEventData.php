<?php

namespace App\Listeners;

use App\Enums\TicketEventType;
use App\Events\TicketOpened;
use App\Models\TicketEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CaptureTicketOpeningEventData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TicketOpened  $event
     * @return void
     */
    public function handle(TicketOpened $event): void
    {
        $ticket = $event->ticket;

        TicketEvent::create([
            'ticket_id' => $ticket->id,
            'event' => TicketEventType::OPENED,
            'event_date' => now(),
        ]);
    }
}
