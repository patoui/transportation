<?php

namespace App\Http\Controllers;

use App\Route;
use App\RouteFilters;
use Illuminate\Http\Request;

class ApiRouteSearchController extends Controller
{
    public function index()
    {
        return Route::search(request('q', null))->get();
    }
}
