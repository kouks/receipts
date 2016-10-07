@if (session()->has('success'))
    <div class="messenger">
        <div class="notification is-success is-fullwidth">
            <button class="delete"></button>

            {{ session('success') }}
        </div>
    </div>
@endif

@if (session()->has('danger'))
    <div class="messenger">
        <div class="notification is-danger is-fullwidth">
            <button class="delete"></button>

            {{ session('danger') }}
        </div>
    </div>
@endif
