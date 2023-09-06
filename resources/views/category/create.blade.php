@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name"
                        name="name" value="{{ old('name') }}" 
                        >
                    <x-error name="name" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

@endsection