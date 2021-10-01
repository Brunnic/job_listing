<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container">
        @yield('content')
    </div>

    @yield('scripts')

    <script>
        var searchButton = document.querySelector('.search-btn');
        searchButton.addEventListener('click', function() {
            window.location.assign(`{{ url('/jobs') }}?q=${document.querySelector('#search').value}`)
        });
    </script>
</body>
</html>