<div class="column is-one-third">
    <div class="card is-fullwidth">
        <header class="card-header">
            <p class="card-header-title">
                {{ $receipt->name }}
            </p>
        </header>

        <div class="card-content content is-small">
            <p>
                {{ $receipt->description }}
            </p>
        </div>

        <footer class="card-footer">
            <p class="card-footer-item">
                {{ $receipt->user->name }} owns &pound;{{ round($receipt->value, 2) }} to {{ $receipt->issuer->name }}
            </p>
        </footer>
    </div>
</div>
