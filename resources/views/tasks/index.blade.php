@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center">Tasks app</h2>
                <div class="input-group mb-3">
                    <form method="GET" class="d-flex w-100">
                        <input type="text" class="form-control me-2" name="search"
                               value="{{ request()->get('search') }}" placeholder="Search task">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
                <div class="mb-3">
                    <a href="{{ route('task.create') }}" class="btn btn-primary" type="button" id="addTask">
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
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success mx-1">Edit</a>
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="mx-auto">
                        {{ $tasks->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
