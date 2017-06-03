<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function show($routeId)
    {
        $route = app(Route::class)
            ->where('route_id', $routeId)
            ->firstOrFail();

        return view('route.show', compact('route'));
    }
}
