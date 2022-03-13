@extends('layout.main')

@section('title', 'Fotografi')

@section('main')
    @if (count($images))
        @foreach ($images as $image)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> {{ $image->title }} </h5>
                    <p class="card-text">{{ $image->image->count() }}</p>
                    <a href="#" class="btn btn-primary">Open Album</a>
                    <img src=" {{ $image->image }} " alt="{{ $image->title }} ">
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            Nuk Keni Foto
        </div>
    @endif
@endsection
