@extends('layout.main')

@section('title', 'Albumet')

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (count($albums))
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            @foreach ($albums as $album)
                <div class="col d-flex align-items-start justify-content-center">
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $album->title }} </h5>
                            <p class="card-text">{{ $album->images->count() . ' Fotografi' }}</p>
                            <div class="btn-group m-auto d-flex justify-content-center" role="group"
                                aria-label="Basic example">
                                <a href=" {{ route('albums.show', ['album' => $album->id]) }} "
                                    class="btn btn-outline-primary">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href=" {{ route('albums.edit', ['album' => $album->id]) }} "
                                    class="btn btn-outline-info">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href=" {{ route('albums.destroy', ['album' => $album->id]) }} "
                                    class="btn btn-outline-danger" onclick="return alert('A jeni i sigurt')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Nuk Keni Albume
        </div>
    @endif
@endsection
