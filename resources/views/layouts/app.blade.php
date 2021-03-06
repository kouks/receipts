<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Receipts') }}</title>

    {{-- Styles --}}
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

    @include('partials.header')

    <section class="section">
        <div class="container">
            @yield('breadcrumbs')
        </div>
    </section>

    <main class="section is-medium">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('partials.messenger')

    @include('partials.footer')

    {{-- Scripts --}}
    <script src="/js/app.js"></script>
</body>
</html>
