@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center">Tasks app</h2>
                <div class="input-group mb-3">
                    <form method="GET" class="d-flex w-100">
                        <input type="text" class="form-control me-2" name="search" value="{{ request()->get('search') }}" placeholder="Search task">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
                <div class="mb-3">
                    <a href="#" class="btn btn-primary" type="button" id="addTask">
                        Create
                    </a>
                </div>
                <div class="card mb-3">
                    @foreach($tasks as $task)
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <p class="card-text">{{ $task->description }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="card-subtitle mb-2 text-muted">{{ $task->created_at }}</p>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
