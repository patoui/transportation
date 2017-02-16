<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test login.
     *
     * @group integration
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create(
            ['password' => bcrypt('test-pass')]
        );

        $response = $this->post(
            '/login',
            [
                'email' => $user->email,
                'password' => 'test-pass'
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
