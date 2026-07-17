<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BiblioTech</title>
</head>
<body>
    <nav>
        <a href="{{ route('books.index') }}">Livres</a>
        <a href="{{ route('authors.index') }}">Auteurs</a>
        <a href="{{ route('genres.index') }}">Genres</a>
    </nav>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <main>
        @yield('content')
    </main>
</body>
</html>