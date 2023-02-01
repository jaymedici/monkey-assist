<?php

namespace Tests\Feature;

use App\Events\TicketOpened;
use App\Http\Livewire\User\CreateTicket;
use App\Models\Category;
use App\Models\User;
use App\Traits\CanGenerateRolesAndPermissions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Tests\TestCase;

class TicketCreationTest extends TestCase
{
    use RefreshDatabase, CanGenerateRolesAndPermissions;

    protected User $user;
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->generateRolesAndPermissions(); 
        $this->user = User::factory()->create();
        $this->admin = User::factory()->create()->assignRole('Admin');
    }


    public function test_ticket_creation_fields_are_validated()
    {
        $this->actingAs($this->user);
        
        Livewire::test(CreateTicket::class)
            ->set('formData', [
                'subject' => '',
                'content' => '',
            ])
            ->call('save')
            ->assertHasErrors([
                'subject' => 'required',
                'content' => 'required',
            ]);
    }

    public function test_ticket_can_be_created_and_stored_to_database()
    {
        $this->actingAs($this->user);
        $category = Category::factory()->create();
        
        Livewire::test(CreateTicket::class)
            ->set('formData', [
                'subject' => 'Test Subject',
                'content' => 'Test Content',
                'categories' => [$category->id],
            ])
            ->call('save')
            ->assertHasNoErrors()
            ->assertEmitted('ticket-opened');

        $this->assertDatabaseHas('tickets', [
                'subject' => 'Test Subject',
                'content' => 'Test Content',
                'user_id' => $this->user->id,
            ]);
    }

    public function test_ticket_categories_are_stored_in_the_pivot_table()
    {
        $this->actingAs($this->user);
        $category = Category::factory()->create();
        
        Livewire::test(CreateTicket::class)
            ->set('formData', [
                'subject' => 'Test Subject',
                'content' => 'Test Content',
                'categories' => [$category->id],
            ])
            ->call('save');

        $ticketId = $this->user->tickets()->first()->id;

        $this->assertDatabaseHas('category_ticket', [
                'ticket_id' => $ticketId,
                'category_id' => $category->id,
            ]);
    }

    public function test_ticket_opened_event_is_dispatched()
    {
        $this->actingAs($this->user);
        $category = Category::factory()->create();
        Event::fake();
        
        Livewire::test(CreateTicket::class)
            ->set('formData', [
                'subject' => 'Test Subject',
                'content' => 'Test Content',
                'categories' => [$category->id],
            ])
            ->call('save');

        Event::assertDispatched(TicketOpened::class);
    }

}
