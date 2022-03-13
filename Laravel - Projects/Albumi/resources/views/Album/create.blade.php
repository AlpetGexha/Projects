@extends('layout.main')

@section('title', 'Krijoni Albume')

@section('main')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }} <br>
            </div>
        @endforeach
    @endif


    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulli</label>
            <input type="text" name="title" value=" {{ old('title') }} " class="form-control" id="exampleInputEmail1">
        </div>
        <button type="submit" class="btn btn-primary">Krijo</button>

    </form>
@endsection
