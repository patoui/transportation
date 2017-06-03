<?php

namespace Tests\Feature;

use App\Route;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Tests\TestCase;

class GetRouteDetailsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Search for a routes by route id.
     *
     * @return void
     */
    public function testGetRouteDetailsById()
    {
        // Arrange
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

        // Act
        $response = $this->get('route/222-256');

        // Assert
        $response
            ->assertStatus(200)
            ->assertSee('222-256')
            ->assertSee('222')
            ->assertSee('Second Street Route 222')
            ->assertSee('Route that runs along Second Street')
            ->assertSee('3')
            ->assertSee('http://transportation.dev/route/222');
            // ->assertJson([$route->toArray()]);
    }
}
