@extends('layout.main')

@section('title', 'Ndrysho Foton')

@section('main')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }} <br>
            </div>
        @endforeach
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('images.update', ['image' => $image->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $image->title }}"
                        placeholder="P.sh: Une dhe Artani" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <label for="image">Imazhi:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button class="btn btn-sm btn-primary mt-4">Ndrysho</button>

                {{-- <div class="form-group mt-4">
                    <img src="{{ $image->image }} " alt="{{ $image->title }} ">
                    <a class="btn btn-sm btn-danger" href="{{ route('images.destroy', ['image' => $image->id]) }} "
                        onclick="return alert('A jeni i sigurt')">
                        Fshije Fotografin
                    </a>
                </div> --}}
            </form>
        </div>
    </div>
@endsection
