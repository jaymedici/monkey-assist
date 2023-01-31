<?php

namespace Tests\Feature\Dashboard;

use App\Http\Livewire\User\TicketSummary;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use App\Traits\CanGenerateRolesAndPermissions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDashboardTest extends TestCase
{
    use RefreshDatabase, CanGenerateRolesAndPermissions;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->generateRolesAndPermissions();
    }

    public function test_categories_are_loaded_on_create_ticket_form(): void
    {
        $category = Category::factory()->create();

        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertSee($category->name);
    }

    public function test_ticket_summaries_are_loaded_and_calculated_correctly(): void
    {
        $openTickets = Ticket::factory()->open()
                ->count(6)->create([
                    'user_id' => $this->user->id
                ]);

        $closedTickets = Ticket::factory()->closed()
                ->count(5)->create([
                    'user_id' => $this->user->id
                ]);

        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertSeeInOrder(['Open Tickets', $openTickets->count()])
            ->assertSeeInOrder(['Closed Tickets', $closedTickets->count()])
            ->assertSeeInOrder(['Total', $openTickets->count() + $closedTickets->count()]);
    }

    public function test_recent_tickets_are_loaded(): void
    {
        $tickets = Ticket::factory()->count(15)->create([
            'user_id' => $this->user->id,
            'created_at' => now()->subDays(5)
        ]);

        $recentTicket = Ticket::factory()->create([
            'user_id' => $this->user->id
        ]);

        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertSee($recentTicket->subject);
    }
}
