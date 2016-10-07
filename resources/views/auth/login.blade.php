@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <form method="POST" action="/login" class="card is-fullwidth is-clearfix">
            {!! csrf_field() !!}

            <header class="card-header">
                <p class="card-header-title">
                    Login
                </p>
            </header>

            <div class="card-content">
                <label class="label">Email</label>
                <p class="control">
                    <input
                        class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
                        name="email"
                        placeholder="Enter your email"
                        required
                        type="email"
                        value="{{ old('email') }}"
                    >
                </p>

                <label class="label">Password</label>
                <p class="control">
                    <input
                        class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                        name="password"
                        placeholder="Enter your password"
                        required
                        type="password"
                        value="{{ old('password') }}"
                    >
                </p>

                <p class="control">
                    <button class="button is-primary">Login</button>
                    <a class="button is-white">New account</a>
                    <a class="button is-white">Resent password</a>
                </p>
            </div>
        </form>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Home', '/')
    ->current('Login') !!}
@stop
