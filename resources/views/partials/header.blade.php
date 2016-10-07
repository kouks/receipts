<section class="hero is-primary is-medium is-bold">
    <div class="hero-head">
        <header class="nav">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item" href="/households">
                        Households
                    </a>
                </div>

                <div class="nav-right">
                    @if (auth()->user())
                        <a class="nav-item" href="/logout">
                            Logout
                        </a>
                    @else
                        <a class="nav-item" href="/login">
                            Login
                        </a>

                        <a class="nav-item" href="/register">
                            Register
                        </a>
                    @endif
                </div>
            </div>
        </header>
    </div>

    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title is-2">
                Receipts
            </h1>

            <h2 class="subtitle is-4">
                The perfect tool for small household management
            </h2>
        </div>
    </div>
</section>
