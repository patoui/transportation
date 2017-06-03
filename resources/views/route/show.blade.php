@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
      <div class="heading">
        <h1 class="title">Route {{ $route->route_id }} Details</h1>
        <ul>
            <li>{{ $route->route_short_name }}</li>
            <li>{{ $route->route_long_name }}</li>
            <li>{{ $route->route_desc }}</li>
            <li>{{ $route->route_type }}</li>
            <li>{{ $route->route_url }}</li>
        </ul>
      </div>
    </div>
</section>
@endsection
