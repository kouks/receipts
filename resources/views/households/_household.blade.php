<div class="column is-one-third">
    <div class="card is-fullwidth">
        <header class="card-header">
            <p class="card-header-title">
                Household {{ $household->name }}
            </p>
        </header>

        <div class="card-content">
            <table class="table">
                <tbody>
                    @foreach ($household->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <footer class="card-footer">
            @can('view', $household)
                <a class="card-footer-item" href="{{ $household->url()->exact() }}" >
                    Visit {{ $household->name }}
                </a>

                @cannot('manage', $household)
                    <a class="card-footer-item" href="{{ $household->url()->exact()->toggle() }}" >
                        Leave
                    </a>
                @endcan
            @else
                <a class="card-footer-item" href="{{ $household->url()->exact()->toggle() }}" >
                    Join {{ $household->name }}
                </a>
            @endcan
        </footer>
    </div>
</div>
