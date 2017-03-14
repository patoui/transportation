<?php

namespace App\Http\Controllers;

use App\Route;
use App\Trip;
use Illuminate\Http\Request;

class ApiTripStopController extends Controller
{
    /**
     * show list of trip stops
     * @param  Route  $route
     * @param  Trip   $trip
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Route $route, Trip $trip)
    {
        return $trip->stops()->get();
    }
}
