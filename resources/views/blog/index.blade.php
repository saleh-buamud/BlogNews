@extends('layouts.app')

@section('content')
    <!-- Display success message if it exists -->
    @if (session()->has('message'))
        <div class="alert alert-danger text-center text-center bold fs-1" role="alert">
            <div style="text-align: center d-flex"> {{ session()->get('message') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Display error message if it exists -->
    @if (session()->has('messageYes'))
        <div class="alert alert-success text-center bold fs-1 " role="alert">
            <div style="text-align: center"> {{ session()->get('messageYes') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mx-auto text-center py-8">
        <h1 class="text-6xl font-bold mb-8">Welcome to Our Website</h1>
        <!-- Check if user is logged in -->
        @if (Auth::check())
            <!-- Link to create post -->
            <a href="{{ route('Blog.create') }}" class="btn btn-primary d-block mx-auto mb-4" style="max-width: 200px;">
                Create Post
            </a>
        @endif
    </div>

    <!-- Loop through posts and display them -->
    <div class="flex flex-wrap justify-center">
        @foreach ($post as $p)
            <div class="d-flex justify-center">
                <div class="w-full md:w-1/2 md:flex mb-8 d-flex justify-content-around">
                    <div class="md:w-1/3 md:mr-4 mb-4 mx-4">
                        <!-- Display post image -->
                        <img src="/images/{{ $p->image_path }}" alt="Image" class="w-full rounded-lg" width="300px">
                    </div>
                    <div class="md:w-2/3 md:ml-4  mb-5">
                        <!-- Display post author -->
                        <h2 class="text-gray-700 font-bold text-4xl mb-4">By: <span
                                class="text-gray-500 italic">{{ $p->user->name }}</span></h2>
                        <!-- Display post title -->
                        <h3 class="text-gray-700 font-bold text-xl mb-2">{{ $p->title }}</h3>
                        <!-- Display post description -->
                        <p class="text-gray-700 mb-4">{{ $p->description }}</p>
                        <div class="flex justify-between items-center d-flex">
                            <!-- Link to show post details -->
                            <a href="{{ route('Blog.show', $p->id) }}" class="btn btn-primary mx-1">SHOW</a>
                            <!-- Check if user is authorized to delete post -->
                            @if (Auth::check() && Auth::user()->id == $p->user_id)
                                <!-- Form to delete post -->
                                <form action="{{ route('Blog.destroy', $p->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
