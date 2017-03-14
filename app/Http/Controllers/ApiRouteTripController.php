<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;

class ApiRouteTripController extends Controller
{
    /**
     * show list of route specific trips
     * @param  Route  $route
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Route $route)
    {
        return $route->trips()->get();
    }
}
