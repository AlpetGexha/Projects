@extends('layouts.main')
@section('title', 'Create Todo Iteam')

@section('body')
    @if ($errors->any)
        @foreach ($erros as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="container mt-5">
        <form action=" {{ route('todos.store') }} " method="POST">
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" />
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">Add</button>
        </form>
    </div>
@endsection
