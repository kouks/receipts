<aside class="menu is-indented-top">
    <p class="menu-label">
        Dashboard
    </p>

    <ul class="menu-list">
        <li><a href="/households/{{ $household->id }}">Overview</a></li>
    </ul>

    <p class="menu-label">
        Receipts
    </p>

    <ul class="menu-list">
        <li><a href="/households/{{ $household->id }}/receipts">All receipts</a></li>
        <li><a href="/households/{{ $household->id }}/receipts/create">Add new receipt</a></li>
    </ul>

    <p class="menu-label">
        Cart
    </p>

    <ul class="menu-list">
        <li><a href="/households/{{ $household->id }}/cart">View cart</a></li>
        <li><a href="/households/{{ $household->id }}/cart/create">Add item to cart</a></li>
    </ul>
</aside>
