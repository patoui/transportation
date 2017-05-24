<?php

namespace App\Http\Controllers;

use App\Route;
use App\RouteFilters;
use Illuminate\Http\Request;

class ApiRouteSearchController extends Controller
{
    public function index()
    {
        \Log::debug('REQUEST QUERY', ['q' => request('q', null)]);
        \Log::debug('REQUEST RESULT', ['result' => Route::search(request('q', null))->get()]);
        return Route::search(request('q', null))->get();
    }
}
