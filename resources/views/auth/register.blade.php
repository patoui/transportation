@extends('layouts.default')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column"></div>
        <div id="login" class="column is-third">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title has-text-centered">
                        Transportation
                    </p>
                </header>
                <form method="post" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="card-content">
                        <div class="content">
                            <p class="control has-icon">
                                <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" placeholder="Name" required>
                                <span class="icon is-small"><i class="fa fa-user"></i></span>
                                @if($errors->has('name'))
                                <span class="help is-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </p>
                            <p class="control has-icon">
                                <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="Email" required>
                                <span class="icon is-small"><i class="fa fa-envelope"></i></span>
                                @if($errors->has('email'))
                                <span class="help is-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </p>
                            <p class="control has-icon">
                                <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" type="password" placeholder="Password" required>
                                <span class="icon is-small"><i class="fa fa-lock"></i></span>
                                @if($errors->has('password'))
                                <span class="help is-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </p>
                            <p class="control has-icon">
                                <input class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" name="password_confirmation" type="password" placeholder="Confirm Password" required>
                                <span class="icon is-small"><i class="fa fa-lock"></i></span>
                                @if($errors->has('password_confirmation'))
                                <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </p>
                            <button class="button is-primary is-submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="column"></div>
    </div>
</div>
@endsection
