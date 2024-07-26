<!-- resources/views/movies/show.blade.php -->
@extends('layout')

@section('title', 'Movie Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $movie->title }}</h1>

    <div class="row">
        <div class="col-md-4">
            @if($movie->poster)
            <img src="{{ $movie->poster }}" alt="Poster" class="img-fluid">
            @else
            <p>No poster available</p>
            @endif
        </div>
        <div class="col-md-8">
            <h3>Details</h3>
            <p><strong>Title:</strong> {{ $movie->title }}</p>
            <p><strong>Intro:</strong> {{ $movie->intro }}</p>
            <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
            <p><strong>Genre:</strong> {{ $movie->genes->name }}</p>
        </div>
    </div>

    <a href="{{ route('movies.index') }}" class="btn btn-primary mt-3">Back to Movies List</a>
</div>
@endsection