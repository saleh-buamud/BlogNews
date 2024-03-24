@extends('layouts.app')

@section('content')
    <!-- Main container -->
    <h2>Create</h2>
    <div class="container mx-auto mt-5">
        <!-- Form for creating a new post -->
        <form action="{{ route('Blog.store') }}" method="POST" enctype="multipart/form-data"
            class="p-5 rounded-lg shadow-lg bg-light">
            @csrf
            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control rounded-pill" id="title" name="title">
                <!-- Error message for title validation -->
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control rounded-pill" id="image" name="image">
                <!-- Error message for image validation -->
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control rounded" id="description" name="description" rows="3"></textarea>
                <!-- Error message for description validation -->
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
        </form>
    </div>
    <!-- End of main container -->
@endsection
