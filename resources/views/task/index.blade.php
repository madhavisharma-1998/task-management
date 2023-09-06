@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <h1>Tasks List</h1>
    <a class="btn btn-primary" href="{{route('task.create')}}">Add Task</a>
    <a class="btn btn-primary" href="{{route('task.archive')}}">Archived Task</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @foreach($task->categories as $category)
                    {{$category->name}}
                    @endforeach
                </td>
                <td>
                    @if($task->status == 1)
                    Complete
                    @else
                    InComplete
                    @endif
                </td>
                <td>
                    <a href="{{ route('task.edit', $task) }}" class="btn btn-primary btn-sm" title="Edit">
                        Edit
                    </a>
                    <a href="{{ route('task.show', $task) }}" class="btn btn-info btn-sm" title="View">
                        Show
                    </a>
                    <form action="{{ route('task.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection