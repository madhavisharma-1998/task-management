@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <form method="post" action="{{route('task.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title"
                        name="title" value="{{ old('title') }}
                        ">
                    <x-error name="title" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">
                        {{old('description')}}</textarea>
                    <x-error name= "description"/>
                </div>
                <div class="mb-3">
                    <label for="category">Categories</label>
                    <select multiple class="form-control" id="category" name="categories[]">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

@endsection