<div class="column is-one-third">
    <div class="card is-fullwidth">
        <header
            class="card-header{{ $item->priority == 3 ? ' is-danger' : ($item->priority == 2 ? ' is-warning' : '') }}"
        >
            <p class="card-header-title">
                {{ $item->name }}
            </p>
        </header>

        <div class="card-content content">
            <p>
                Issued by: {{ $item->user->name }}
            </p>
        </div>

        <form class="card-footer" method="POST" action="/households/{{ $item->household->id }}/cart/{{ $item->id }}">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}

            <button class="button is-success is-inverted">Solve</button>
        </form>
    </div>
</div>
