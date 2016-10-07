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
            For adding a item to cart
        </h2>

        <div class="columns">
            <div class="column is-half">
                <form action="/households/{{ $household->id }}/cart" method="POST" class="card is-fullwidth">
                    @include('cart._form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Home', '/')
    ->fragment('Households', '/households')
    ->fragment($household->name, "/households/$household->id")
    ->fragment('Cart', "/households/$household->id/cart")
    ->current('New') !!}
@stop
