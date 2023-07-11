<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- CSS assets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- This is where you could include a navigation bar, for instance -->
    </header>

    <main class="container">
        <!-- Here's where the main content will go -->
        @yield('content')
    </main>

    <footer>
        <!-- And a footer here -->
    </footer>

    <!-- JS assets -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Yield any additional scripts -->
    @yield('scripts')
</body>
</html>
