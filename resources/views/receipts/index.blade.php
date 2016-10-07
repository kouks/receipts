@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-2">
        @include('partials.aside')
    </div>

    <div class="column">
    	<h1 class="title">
    		Showing all receipts
    	</h1>

        <h2 class="subtitle">
            For the {{ $household->name }} household
        </h2>

        <div class="columns is-multiline">
            @each('receipts._receipt', $receipts, 'receipt')
        </div>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Home', '/')
    ->fragment('Households', '/households')
    ->fragment($household->name, "/households/$household->id")
    ->current('Receipts') !!}
@stop
