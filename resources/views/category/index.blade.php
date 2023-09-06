@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <h1>Category List</h1>
    <a class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->status == 1)
                        Active
                    @else
                        InActive
                    @endif
                </td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm" title="Edit">
                        Edit
                    </a>
                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm" title="View">
                        Show
                    </a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                            onclick="return confirm('Are you sure you want to delete this item?')">
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