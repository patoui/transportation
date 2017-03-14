<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;

class ApiRouteTripController extends Controller
{
    /**
     * index list of route specific trips
     * @param  Route  $route
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Route $route)
    {
        return $route->trips()->get();
    }
}
