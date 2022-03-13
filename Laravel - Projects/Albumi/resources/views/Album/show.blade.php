@extends('layout.main')

@section('title', 'Album ')

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1> {{ $albums->title }} </h1>

    <p>Ky album ka: {{ $albums->images->count() }} Fotografi
        <a class="btn btn-sm btn-primary" href=" {{ route('images.create', ['album' => $albums->id]) }} ">
            Shto fotografi te reja
        </a>
    </p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        @foreach ($albums->images as $image)
            <div class="col">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('uploads/' . $image->image) }}" class="img-fluid d-block"
                        alt="{{ $image->title }}" />
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('images.edit', ['image' => $image->id]) }}" class="btn btn-outline-info">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="{{ route('images.destroy', ['image' => $image->id]) }}" class="btn btn-outline-danger"
                        onclick='return confirm("A jeni i sigurt");'>
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
