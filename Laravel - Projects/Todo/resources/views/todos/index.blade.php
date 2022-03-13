@extends('layouts.main')
@section('title', 'ToDo Main Page')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<style>
    .titulli {
        font-size: 20px;
    }

</style>

@section('body')
{{-- KxVqooiYQEQb --}}
    <div class="container mt-5">
        {{ $todos->links() }}
        <a href=" {{ route('todos.create') }} " class="btn btn-sm btn-info">Create New</a>
        @if (count($todos))
            <table class="table table-striped">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulli</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col"> </th>
                </tr>

                @foreach ($todos as $i => $todo)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>
                            <p class="titulli"> {{ $todo->title }} </p>
                        </td>
                        <td>{{ $todo->created_at }}</td>
                        <td>

                            @if ($todo->com)
                                <span class="badge badge-sm bg-success">Completed</span>
                            @else
                                <span class="badge badge-sm bg-danger">UnCompleted</span>
                            @endif
                        </td>
                        <td class="form-inline">
                            <a href=" {{ route('todos.show', ['todo' => $todo->id]) }} ">Preview</a>
                            <a href=" {{ route('todos.edit', ['todo' => $todo->id]) }} ">Edit</a>
                            <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are u sure');">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Delete</button>

                            </form>
                            <form action="{{ route('todos.completed', ['todo' => $todo->id]) }}" method="POST"
                                class="d-inline">
                                @method('PUT')
                                @csrf
                                @if (!$todo->com)
                                    <button class="btn btn-sm btn-danger">Mark Completed</button>
                                @endif

                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>

            <div class="d-flex justify-content-end">
                {{ $todos->links() }}
            </div>
        @else
            <div class="alert alert-info">
                Yout todos table is empty
            </div>
        @endif
    </div>
@endsection
