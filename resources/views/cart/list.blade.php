@extends('layouts.empty')

@section('content')
<div class="columns is-multiline">
    @each('cart._item', $cart, 'item')
</div>
@stop
