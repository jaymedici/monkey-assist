<?php

namespace App\Listeners;

use App\Events\TicketOpened;
use App\Models\User;
use App\Notifications\NewTicketOpenedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendTicketOpenedNotification
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
        $adminEmails = User::role('Admin')->pluck('email');
        
        Notification::route('mail', $adminEmails)
            ->notify(new NewTicketOpenedNotification($ticket));
    }
}
