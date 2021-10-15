@extends('layouts.main')
@section('title', 'Edit Todo Iteam ')

@section('body')
    @if ($errors->any)
        @foreach ($errors as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="container mt-5">
        <form action=" {{ route('todos.store', ['todo' => $todo->id]) }} " method="POST">
            <input type="text" name="title" value=" {{ $todo->title }} " class="form-control" />
            <input class="form-check-input" type="checkbox" name="com" value="1" @if ($todo->com) Checked @endif /> <br>
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </form>
    </div>
@endsection
