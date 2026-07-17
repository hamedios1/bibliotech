<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech — @yield('title', 'Bibliothèque du département')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <a href="{{ route('books.index') }}" class="brand">BiblioTech</a>
        <nav class="site-nav">
            <a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.*') ? 'is-active' : '' }}">Livres</a>
            <a href="{{ route('authors.index') }}" class="{{ request()->routeIs('authors.*') ? 'is-active' : '' }}">Auteurs</a>
            <a href="{{ route('genres.index') }}" class="{{ request()->routeIs('genres.*') ? 'is-active' : '' }}">Genres</a>
        </nav>
    </header>

    <main class="page">
        @if(session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>