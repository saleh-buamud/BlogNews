@extends('layouts.app')
@section('content')
    <form action="{{ route('Blog.store') }}" method="POST" enctype="multipart/form-data"
        class="p-5 rounded-lg shadow-lg bg-light">
        @csrf
        <h1 class="text-center display-4">Create</h1>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control rounded-pill" id="title" name="title">
        </div>
        <div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control rounded-pill" id="image" name="image">
        </div>
        <div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control rounded" id="description" name="description" rows="3"></textarea>
        </div>
        <div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
    </form>
@endsection
