@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success text-center bold fs-1 " role="alert">
            <div style="text-align: center"> {{ session()->get('message') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-5">
        <div class="card border-3 shadow mb-5  ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/images/{{ $post->image_path }}" alt="Image" class="img-fluid"
                        style="height: 400px; object-fit: cover;">
                </div>
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="card-body text-center ">
                        <h3 class="card-title"> Author : {{ $post->user->name }}</h3>
                        <h5 class="card-title"> Title : {{ $post->title }}</h5>
                        <p class="card-text">Description : {{ $post->description }}</p>
                        <div class="text-center">
                            <strong> DATE : {{ $post->created_at }}</strong><br>
                            @if (Auth::check() && Auth::user()->id == $post->user_id)
                                <a href="{{ route('Blog.edit', $post->id) }}" class="btn btn-primary mt-4">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
