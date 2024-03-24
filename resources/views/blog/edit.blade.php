@extends('layouts.app')

@section('content')
    <!-- Form for updating a post -->
    <form action="{{ route('Blog.update', $data->id) }}" method="POST" enctype="multipart/form-data"
        class="p-5 rounded-lg shadow-lg bg-light">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control rounded-pill" id="title" name="title"
                value="{{ $data->title }}">
            <!-- Error message for title validation -->
            @error('Title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image upload -->
        <div class="mb-3">
            <label for="title" class="form-label">Image</label>
            <input type="file" class="form-control rounded-pill" id="image" name="image">
            <!-- Error message for image validation -->
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control rounded" id="description" name="description"
                rows="3">{{ $data->description }}</textarea>
            <!-- Error message for description validation -->
            @error('description')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
@endsection
