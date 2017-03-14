<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test registration.
     *
     * @group integration
     * @return void
     */
    public function testRegistration()
    {
        $response = $this->post(
            '/register',
            [
                'name' => 'John Doe',
                'email' => 'john.doe@test.com',
                'password' => 'test-pass',
                'password_confirmation' => 'test-pass'
            ]
        );

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
