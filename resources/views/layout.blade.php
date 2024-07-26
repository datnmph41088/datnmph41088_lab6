<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <a style="color: black;" href="{{ url('/') }}">Home</a>
                <a style="color: black;" href="{{ url('/books') }}">Books</a>
                <a style="color: black;" href="{{ url('/about') }}">About</a>
                <a style="color: black;" href="{{ url('/contact') }}">Contact</a>
            </nav>
        </div>
    </header>
    <nav>Navigation</nav>
    <article>
        @yield('content')
    </article>
    <aside>Asider</aside>
    <footer>Footer</footer>
</body>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this movie?');
    }
</script>

</html>