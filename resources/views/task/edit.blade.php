@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <form method="POST" action="{{route('task.update', $task)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title"
                        name="title" value="{{$task->title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        name="description">{{$task->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="1" {{ $task->status === '1' ? 'selected' : '' }}>Complete</option>
                        <option value="0" {{ $task->status === '0' ? 'selected' : '' }}>InComplete</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category">Categories</label>
                    <select multiple class="form-control" id="category" name="categories[]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('categories') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

@endsection