<?php

namespace Tests\Feature\Dashboard;

use App\Models\User;
use App\Traits\CanGenerateRolesAndPermissions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardAccessTest extends TestCase
{
    use RefreshDatabase, CanGenerateRolesAndPermissions;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->generateRolesAndPermissions();
    }

    public function test_appropriate_dashboard_is_loaded_for_normal_users(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertOk()
            ->assertViewIs('dashboards.user-dashboard');
    }

    public function test_appropriate_dashboard_is_loaded_for_admin_users(): void
    {
        $this->user->assignRole('Admin');

        $response = $this
            ->actingAs($this->user)
            ->get('/');

        $response
            ->assertOk()
            ->assertViewIs('dashboards.admin-dashboard');
    }

}
