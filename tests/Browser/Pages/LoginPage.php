<?php

namespace Tests\Browser\Pages;

use App\User;
use Laravel\Dusk\Browser;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs('/login');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@name' => 'input[name=email]',
            '@password' => 'input[name=password]',
        ];
    }

    // Throws exception:
    // Exception: User resolver has not been set.
    public function login(Browser $browser, $email)
    {
        $browser->type('email', $email)
            ->type('password', 'secret')
            ->press('Login')
            ->assertPathIs('/');
    }
}
