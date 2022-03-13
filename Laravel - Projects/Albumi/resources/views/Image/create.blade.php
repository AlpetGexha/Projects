@extends('layout.main')

@section('title', 'Krijoni Foton')

@section('main')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }} <br>
            </div>
        @endforeach
    @endif


    <form action="{{ route('images.store', ['album' => $album->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="v" class="form-label">Titulli: </label>
            <input type="text" name="title" value="{{ old('title') }} " class="form-control" id="Titulli">
        </div>
        <div class="mb-3">
            <label for="image">Imazhi: </label>
            <input type="file" name="image" id="image" value="{{ old('image') }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Krijo</button>
    </form>
@endsection
