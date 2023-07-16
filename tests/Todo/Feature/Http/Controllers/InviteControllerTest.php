<?php

namespace Tests\Todo\Feature\Http\Controllers;

use App\Models\Invite;
use App\Models\User;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InviteController
 */
class InviteControllerTest extends TestCase
{
    /**
     * @test
     */
    public function create_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.invites.create', ['user' => $user]));

        $response->assertRedirect(withErrors('Invitations Are Disabled Due To Open Registration!'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = User::factory()->create();
        Invite::factory()->create(['user_id', $user->id]);

        $response = $this->actingAs($user)->get(route('users.invites.index', ['user' => $user]));

        $response->assertOk();
        $response->assertViewIs('user.invite.index');
        $response->assertViewHas('owner');
        $response->assertViewHas('invites');
        $response->assertViewHas('route');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function send_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = User::factory()->create();
        $invite = Invite::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post(route('users.invites.send', ['user' => $user, 'invite' => $invite->id]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(withErrors('The invite you are trying to resend has already been used.'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('invites.store', ['user' => $user]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(withErrors('Invites are currently disabled for your group.'));

        // TODO: perform additional assertions
    }

    // test cases...
}
