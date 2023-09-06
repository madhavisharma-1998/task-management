@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <h1>Tasks List</h1>
    <a class="btn btn-primary" href="{{route('task.create')}}">Add Task</a>
    <a class="btn btn-primary" href="{{route('task.archive')}}">Archived Task</a>
    <a class="btn btn-secondary" href="{{route('task.index')}}">All Tasks</a>
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
                    <a href="{{ route('task.restore', $task) }}" class="btn btn-warning">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection