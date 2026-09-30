@extends('layouts.app')

@section('title', 'Add New Movie')

@section('content')
    <h2>Add New Movie</h2>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre" id="genre" class="form-control">
                <option value="">-- Select Genre --</option>
                <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                <option value="Drama" {{ old('genre') == 'Drama' ? 'selected' : '' }}>Drama</option>
                <option value="Fantasy" {{ old('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                <option value="Action" {{ old('genre') == 'Action' ? 'selected' : '' }}>Action</option>
            </select>
            @error('genre')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" name="rating" id="rating" class="form-control" value="{{ old('rating') }}">
            @error('rating')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" name="director" id="director" class="form-control" value="{{ old('director') }}">
            @error('director')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}">
            @error('year')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Movie</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
