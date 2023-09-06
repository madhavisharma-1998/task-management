@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- Main content of the view page goes here -->
            <div class="card">
                <div class="card-body">
                    <h4>Category Details</h4>
                    <p>Name: {{ $category->name }}</p>
                    {{-- <p>Description: {{ $task->description }}</p> --}}
                    <!-- Add more details as needed -->
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
