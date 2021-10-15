@extends('layouts.main')
@section('title', 'Show Todo Iteam')

@section('body')

    <div class="container mt-5">
        <table class="table table-striped">

            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulli</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col"> </th>
            </tr>

            <tr>
                <th scope="row">{{ $todo->id }}</th>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->created_at }}</td>
                <td>
                    @if ($todo->completed)
                        <span class="badge badge-sm bg-success">Completed</span>
                    @else
                        <span class="badge badge-sm bg-danger">UnCompleted</span>
                    @endif
                </td>
        </table>
        <a href=" {{ route('todos.index') }} " class="btn btn-info">Back to Todos Iteam</a>
    </div>

@endsection
