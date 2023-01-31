<?php

namespace Tests\Feature;

use App\Models\User;
use App\Traits\CanGenerateRolesAndPermissions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuAccessTest extends TestCase
{
    use RefreshDatabase, CanGenerateRolesAndPermissions;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->generateRolesAndPermissions();
    }

    public function test_normal_users_can_not_access_admin_menu_items(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertDontSee('All Submitted Tickets')
            ->assertDontSee('User Management');
    }

    public function test_admin_users_can_not_access_my_tickets_menu_item(): void
    {
        $this->user->assignRole('Admin');

        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertDontSee('My Tickets');
    }

    public function test_admin_users_can_access_admin_menu_items(): void
    {
        $this->user->assignRole('Admin');

        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertSee('All Submitted Tickets')
            ->assertSee('User Management');
    }

    public function test_normal_users_can_access_my_tickets_menu_item(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertSee('My Tickets');
    }

}
