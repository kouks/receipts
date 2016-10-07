@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-2">
        @include('partials.aside')
    </div>

    <div class="column">
    	<h1 class="title">
    		Repayment
    	</h1>

        <h2 class="subtitle">
            Between {{ auth()->user()->name }} and {{ $user->name }}
        </h2>

        <div class="columns">
            <div class="column">
                @if ($amount < 0)
                    <h2>{{ $user->name }} owns &pound;{{ abs($amount) }} to {{ auth()->user()->name }}</h2>
                @elseif ($amount > 0)
                    <h2>{{ auth()->user()->name }} owns &pound;{{ abs($amount) }} to {{ $user->name }}</h2>
                @else
                    <h2>Nothing to repay, yaay!</h2>
                @endif

                <br>
                
                @if ($amount <> 0)
                    <form action="/households/{{ $household->id }}/repay/{{ $user->id }}" method="POST">
                        {!! csrf_field() !!}

                        <button class="button is-info">Complete repayment</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Households', '/households')
    ->fragment($household->name, "/households/$household->id")
    ->current('Repayment') !!}
@stop
