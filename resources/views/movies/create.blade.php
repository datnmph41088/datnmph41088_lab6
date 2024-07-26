@extends('layout')

@section('title', 'Add New Movie')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add New Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        @include('admin._form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection