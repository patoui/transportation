<?php

namespace App\Http\Controllers;

use App\Route;
use App\RouteFilters;
use Illuminate\Http\Request;

class ApiRouteSearch extends Controller
{
    public function index(RouteFilters $filters)
    {
        return Route::filter($filters)->get();
    }
}
