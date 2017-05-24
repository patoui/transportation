<?php

namespace Tests\Browser;

use App\Route;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PatOui\Scout\Engines\TestingEngine;
use Tests\DuskTestCase;

class SearchForRouteTest extends DuskTestCase
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
            'route_id' => '321-123',
            'route_short_name' => 'Durham College & Go Station',
        ]);

        $this->browse(function ($browser) use ($user) {
            $result = $browser->loginAs($user)
                    ->visit('/')
                    ->type('search', 'd')
                    ->assertPathIs('/')
                    ->assertSee('321-123')
                    ->assertSee('Durham College & Go Station');
        });
    }
}
