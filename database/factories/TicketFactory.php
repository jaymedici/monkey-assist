<?php

namespace Database\Factories;

use App\Enums\TicketStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([
                        TicketStatus::OPEN, TicketStatus::CLOSED]),
            'user_id' => User::factory(),
        ];
    }
    
    /**
     * Set the ticket status to open.
     *
     * @return Factory
     */
    public function open(): Factory
    {
        return $this->state([
            'status' => TicketStatus::OPEN,
        ]);
    }

    /**
     * Set the ticket status to closed.
     *
     * @return Factory
     */
    public function closed(): Factory
    {
        return $this->state([
            'status' => TicketStatus::CLOSED,
        ]);
    }
}
