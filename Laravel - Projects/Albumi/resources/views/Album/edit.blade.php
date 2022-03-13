@extends('layout.main')

@section('title', 'Ndrysho Albume')

@section('main')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }} <br>
            </div>
        @endforeach
    @endif

    <form action=" {{ route('albums.update', ['album' => $albums->id]) }} " method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulli</label>
            <input type="text" name="title" value=" {{ $albums->title }} " class="form-control" id="exampleInputEmail1">
        </div>
        <button type="submit" class="btn btn-primary">Ndrysho</button>

    </form>
@endsection
