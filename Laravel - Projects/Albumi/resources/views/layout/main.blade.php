<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ 'AlpetG Album' }}</title>
    {{-- //env('APP_NAME') --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    {{-- Header --}}

    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href=" {{ route('albums.index') }} "><b>AlpetG Album</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02"
                aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=" {{ route('albums.create') }} ">
                            <i>Krijoni Albume</i>
                        </a>
                    </li>
                </ul>
                <form action="{{ route('albums.index') }}" method="GET" class="d-flex">
                    <input class="form-control me-2" type="search"name="q" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Main --}}

    <div class="container mt-5">

        @yield('main')
    </div>

    {{-- Footer --}}
    <div class="navbar mt-3 navbar-dark bg-dark">
        <p class="m-auto text-white font-monospace"> &copy; Copyright AlpetG {{ date('Y') }} </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- Icone --}}
    <script src="https://kit.fontawesome.com/da98020d2d.js" crossorigin="anonymous"></script>
</body>

</html>
