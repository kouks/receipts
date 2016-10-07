@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-2">
        @include('partials.aside')
    </div>

    <div class="column">
        <div class="columns is-multiline">
            <div class="column is-12">
            	<h1 class="title">
            		Household {{ $household->name }}
            	</h1>

                <h2 class="subtitle">
                    Owned by {{ $household->user->name }}
                </h2>
            </div>

            <div class="column is-12">
            	<h3 class="title is-4">
            		Members
            	</h3>

                <table class="table is-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($household->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->id !== auth()->user()->id)
                                        <a
                                            href="/households/{{ $household->id }}/repay/{{ $user->id }}"
                                            class="button is-info"
                                        >
                                            Repay
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $user->id === $household->user->id ? 'Owner' : 'Member' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('breadcrumbs')
{!! app('breadcrumbs')
    ->fragment('Home', '/')
    ->fragment('Households', '/households')
    ->current($household->name) !!}
@stop
