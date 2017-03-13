@extends('layouts.app')

@section('pre-scripts')
<script type="text/javascript">
    window.google = {!! json_encode(
        ['maps_api_key' => $googleApiKey]
    ) !!};
</script>
@endsection

@section('splash')
<div class="hero-body">
    <div class="container has-text-centered">
        <h1 class="title">Transportation</h1>
        <h2 class="subtitle">The only transportation app you'll ever need</h2>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="container">
      <div class="heading">
        <h1 class="title">Dashboard</h1>
        <h2 class="subtitle">
          A simple container to divide your page into <strong>sections</strong>, like the one you're currently reading
        </h2>
      </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <map-vue></map-vue>
    </div>
</section>
<h1>{!! $googleApiKey !!}</h1>
@endsection
