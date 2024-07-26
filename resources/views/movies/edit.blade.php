<!-- resources/views/movies/edit.blade.php -->
@extends('layout')

@section('title', 'Edit Info Movie')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Update Movie Information</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin._form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection