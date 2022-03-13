<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="font-sans antialiased bg-light mt-5">
    <div class="container mt-4">
        {{-- get session --}}
        @if (session('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('store') }}" class="card shadow mt-1 mb-4 py-2" method="POST">
            @csrf

            <div class="card-header">
                Shorting Url
            </div>

            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Url</span>
                    </div>
                    <input type="text" autofocus name="url" value="{{ old('url') }}" class="form-control"
                        placeholder="Shkruaj Urln">
                    <button class="btn btn-outline-secondary ms-2" type="submit" id="button-addon2">Shorting</button>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="col-md-3" style="margin-right: 6rem;">
                        <input class="form-control" type="text" name="code" value="{{ old('code') }}"
                            placeholder="costum code">
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
