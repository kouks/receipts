@extends('layouts.app')

@section('content')

@stop

@section('breadcrumbs')
{!! app('breadcrumbs')->current('Home') !!}
@stop
