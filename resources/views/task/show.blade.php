@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- Main content of the view page goes here -->
            <div class="card">
                <div class="card-body">
                    <h4>Task Details</h4>
                    <p>Title: {{ $task->title }}</p>
                    <p>Description: {{ $task->description }}</p>
                    <p>Status: @if($task->status ==1) Completed @else InComplete @endif</p>
                    <p>Category: 
                        @foreach($task->category as $category)
                            {{$category->name}}
                        @endforeach
                    </p>
                    <!-- Add more details as needed -->
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
