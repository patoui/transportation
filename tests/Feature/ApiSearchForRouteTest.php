<?php

namespace Tests\Feature;

use App\Route;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ApiSearchForRouteTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Search for a routes by route id.
     *
     * @return void
     */
    public function testSearchByRouteId()
    {
        Passport::actingAs(factory(User::class)->create());

        $route = factory(Route::class)->create(
            [
                'route_id' => '222-256',
                'route_short_name' => '222',
                'route_long_name' => 'Second Street Route 222',
                'route_desc' => 'Route that runs along Second Street',
                'route_type' => '3',
                'route_url' => 'http://transportation.dev/route/222'
            ]
        );

        $response = $this
            ->json(
                'GET',
                '/api/route/search?q=' . urlencode('222-256')
            );

        $response
            ->assertStatus(200)
            ->assertJson([$route->toArray()]);
    }

    /**
     * Search for a routes by name.
     *
     * @return void
     */
    public function testSearchByName()
    {
        Passport::actingAs(factory(User::class)->create());

        $route = factory(Route::class)->create(
            [
                'route_id' => '101-256',
                'route_short_name' => '101',
                'route_long_name' => 'Main Street Route 101',
                'route_desc' => 'Route that runs along Main Street',
                'route_type' => '3',
                'route_url' => 'http://transportation.dev/route/101'
            ]
        );

        $response = $this
            ->json(
                'GET',
                '/api/route/search?name=' . urlencode('Main Street')
            );

        $response
            ->assertStatus(200)
            ->assertJson([$route->toArray()]);
    }

    /**
     * Search for a routes by type.
     *
     * @return void
     */
    public function testSearchByType()
    {
        Passport::actingAs(factory(User::class)->create());

        $route = factory(Route::class)->create(
            [
                'route_id' => '333-256',
                'route_short_name' => '333',
                'route_long_name' => 'Thirty Third Street Route 333',
                'route_desc' => 'Route that runs along Thirty Third',
                'route_type' => '3',
                'route_url' => 'http://transportation.dev/route/333'
            ]
        );

        $response = $this
            ->json(
                'GET',
                '/api/route/search?type=3'
            );

        $response
            ->assertStatus(200)
            ->assertJson([$route->toArray()]);
    }
}
