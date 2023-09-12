<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanShowRolePage()
    {
        $user = User::role('admin')->get()->random();
        $this->actingAs($user);
        $response = $this->get('/roles')
            ->assertOk();
    }

    function testCannotShowRolePage()
    {
        $user = User::role('staff')->get()->random();
        $this->actingAs($user)
            ->get('roles')
            ->assertStatus(403);
    }

    function testCannotShowRoleNotLogin()
    {
        $this->get('roles')
            ->assertRedirect('login')
            ->assertStatus(302);
    }

    function testCanCreateRole()
    {
        $user = User::role('admin')->get()->random();
        $this->actingAs($user);
        $response = $this->get('/roles/create')
            ->assertOk();
    }

    function testCannotCreateRole()
    {
        $user = User::role('staff')->get()->random();
        $this->actingAs($user);
        $response = $this->get('/roles/create')
            ->assertStatus(403);
    }

    function testCannotCreateRoleNotLogin()
    {
        $this->get('roles/create')
            ->assertRedirect('login')
            ->assertStatus(302);
    }
}
