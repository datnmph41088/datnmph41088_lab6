@extends('layout')

@section('title', 'movies List')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Movies List</h1>

    <!-- Search Form -->
    <form action="{{ route('movies.search') }}" method="GET" class="mb-4">
        <div class="input-group" style="display: flex;">
            <input style="width: 100%;" type="text" name="keyword" class="form-control" placeholder="Search movies..." value="{{ request('keyword') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    <div style="justify-content: flex-end; display: flex; margin-bottom: 20px;">
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Add New movie</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Poster</th>
                <th>Intro</th>
                <th style="width: 100px;">Release At</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>
                    <img style="height: 120px;" src="{{ $movie->poster }}" alt="">
                </td>
                <td>{{ $movie->intro }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->genes->name }}</td>
                <td style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
                    </div>
                    <div style="padding: 4px;">
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </div>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="border:none; padding:0; margin:0; background-color:transparent;" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection