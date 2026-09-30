<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Movie Collection')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>My Anime Movie Collection</h1>
        <p>Paul Rendon B. Ranecolla | Block 4A</p>
        @include('partials._nav')
    </header>

    <main class="container mt-4">
        {{-- ✅ FLASH MESSAGE DISPLAY --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 Paul Rendon B. Ranecolla</p>
    </footer>
</body>

</html>
