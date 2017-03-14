<?php

namespace Tests\Feature;

use App\Route;
use App\Trip;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;
use Tests\TestCase;

class GetRouteTripsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Get route trips.
     *
     * @return void
     */
    public function testRouteTrips()
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

        $trip = factory(Trip::class)->create(
            [
                'route_id' => $route->route_id,
                'service_id' => 'JAN17B-JANDA17-Weekday-17',
                'trip_id' => '44818046-JAN17B-JANDA17-Weekday-17',
                'trip_headsign' => 'Greenboro',
                'direction_id' => '1',
                'block_id' => '5272019'
            ]
        );

        $response = $this
            ->json(
                'GET',
                '/api/route/' . $route->id . '/trips'
            );

        $response
            ->assertStatus(200)
            ->assertJson($route->trips()->get()->toArray());
    }
}
