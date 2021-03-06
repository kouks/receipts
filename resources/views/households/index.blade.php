@extends('layouts.app')

@section('content')

<div class="columns is-multiline">
    @each('households._household', $households, 'household')

    <div class="column is-one-third">
        <form action="/households" method="POST" class="card is-fullwidth">
            @include('households._form')
        </form>
    </div>
</div>

{{-- <households></households> --}}
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->current('Households') !!}
@stop
