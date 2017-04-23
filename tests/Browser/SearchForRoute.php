<?php

namespace Tests\Browser;

use App\Route;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class SearchForRoute extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test you can search and find a route by shortname.
     *
     * @return void
     */
    public function testSearchShortName()
    {
        // Setup user
        $user = factory(User::class)->create();
        // Setup fake route with short name
        factory(Route::class)->create([
            'route_short_name' => 'Durham College & Go Station',
        ]);

        $this->browse(function ($browser) use ($user) {
            $result = $browser->loginAs($user)
                    ->visit('/')
                    ->type('search', 'Durham College & Go Station')
                    ->press('Search')
                    ->assertPathIs('/')
                    ->assertQueryStringHas(
                        'search',
                        'Durham College & Go Station'
                    );
        });
    }
}
