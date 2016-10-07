@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <form method="POST" action="/register" class="card is-fullwidth is-clearfix">
            {!! csrf_field() !!}

            <header class="card-header">
                <p class="card-header-title">
                    Register
                </p>
            </header>

            <div class="card-content">
                <label class="label">Name</label>
                <p class="control">
                    <input
                        class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
                        name="name"
                        placeholder="Enter your name"
                        required
                        type="name"
                        value="{{ old('name') }}"
                    >
                </p>

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
                    >
                </p>

                <label class="label">Confirm Password</label>
                <p class="control">
                    <input
                        class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}"
                        name="password_confirmation"
                        placeholder="Enter your password"
                        required
                        type="password"
                    >
                </p>

                <p class="control">
                    <button class="button is-primary">Register</button>
                    <a href="/login" class="button is-white">Already have an account?</a>
                </p>
            </div>
        </form>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Home', '/')
    ->current('Register') !!}
@stop
