@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <form method="POST" action="{{route('category.update', $category)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name"
                        name="name" value="{{$category->name}}" required="">
                </div>
                <x-error name="name" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

@endsection