@extends('layouts.app')

<!-- Main Content -->
@section('content')
{{-- <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-offset-desktop">
    <form method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}

        <div class="login-form mdl-card mdl-shadow--2dp">

            <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Reset password</h2>
            </div>

            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label
                    {{ $errors->has('email') ? 'is-invalid' : '' }}">

                    <input
                        class="mdl-textfield__input"
                        id="email"
                        name="email"
                        required
                        type="text"
                        value="{{ old('email') }}"
                    >
                    <label class="mdl-textfield__label" for="email">Email address</label>
                </div>
            </div>

            <div class="mdl-card__supporting-text">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                    Send password reset link
                </button>
            </div>

            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect" href="{{ url('/login') }}">
                    Back to login
                </a>
            </div>

        </div>
    </form>
</div> --}}
@endsection
