<?php

namespace Database\Seeders;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_events')->delete();

        Ticket::chunk(100, function ($tickets) {
            foreach ($tickets as $ticket) {

                // If ticket is open, just create an event for opening the ticket
                if ($ticket->status === TicketStatus::OPEN)
                {
                    $ticket->events()->create([
                        'event' => 'Ticket opened',
                        'event_date' => $ticket->updated_at,
                    ]);
                }

                // If ticket is closed, create an event for opening and closing the ticket
                elseif ($ticket->status === TicketStatus::CLOSED)
                {
                    $ticket->events()->create([
                        'event' => 'Ticket opened',
                        'event_date' => $ticket->updated_at,
                    ]);

                    $ticket->events()->create([
                        'event' => 'Ticket closed',
                        'event_date' => fake()
                            ->dateTimeBetween($ticket->updated_at, '+30 days'),
                    ]);
                }
            }
        });
    }
}
