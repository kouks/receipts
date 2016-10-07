@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-2">
        @include('partials.aside')
    </div>

    <div class="column">
    	<h1 class="title">
    		Showing the form
    	</h1>

        <h2 class="subtitle">
            For adding a new receipt
        </h2>

        <div class="columns">
            <div class="column is-half">
                <form action="/households/{{ $household->id }}/receipts" method="POST" class="card is-fullwidth">
                    @include('receipts._form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Households', '/households')
    ->fragment($household->name, "/households/$household->id")
    ->fragment('Receipts', "/households/$household->id/receipts")
    ->current('New') !!}
@stop
