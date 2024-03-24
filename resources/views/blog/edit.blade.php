@extends('layouts.app')
@section('content')
    <form action="{{ route('Blog.update', $data->id) }}" method="POST" enctype="multipart/form-data"
        class="p-5 rounded-lg shadow-lg bg-light">
        @csrf
        @method('PUT')
        <h1 class="text-center display-4">Edit</h1>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control rounded-pill" id="title" name="title"value="{{ $data->title }}">
        </div>
        <div>
            @error('Title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <div class="mb-3">
                <label for="title" class="form-label">Image</label>
                <input type="file" class="form-control rounded-pill" id="image" name="image">
            </div>
            <div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control rounded" id="description" name="description" rows="3">{{ $data->description }}</textarea>
        </div>

        <div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
@endsection
