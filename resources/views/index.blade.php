@extends('layouts.app')

@section('content')
    <style>
        .hero-img {
            background: url('https://images.unsplash.com/photo-1597839219216-a773cb2473e4?fit=crop&w=1478') no-repeat center / cover;
            background-attachment: fixed;
            height: 600px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .btn-read-more {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-read-more:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="hero-img d-flex flex-column align-items-center justify-content-center">
        <h1 class="text-white display-1 text-uppercase fw-bold px-5">Welcome</h1>
        <p class="text-2xl mb-8  dsplay-2 fs-3"style="color: white;">Saleh Backend Developer</p>
        <p class="text-3xl mb-3 dsplay-4 fs-5" style="color: white;"> laravel 10</p>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="https://picsum.photos/id/239/960/620" class="card-img-top rounded" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">Hello Saleh</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adi fugit.</p>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam adipisci in eius quo amet
                    quasi voluptate perferendis accusantium, labore laborum dolores saepe delectus iure! Tenetur illum magni
                    quam aperiam earum.</p>
                <a href="/" class="btn btn-primary btn-read-more">Read more</a>
            </div>
        </div>
    </div>

    <div class="text-center py-5 bg-dark text-light mt-3">
        <h2 class="text-2xl">Blog Categories</h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="font-weight-bold text-2xl py-2">Frontend</div>
                </div>
                <div class="col-md-3">
                    <div class="font-weight-bold text-2xl py-2">Backend</div>
                </div>
                <div class="col-md-3">
                    <div class="font-weight-bold text-2xl py-2">UI/UX</div>
                </div>
                <div class="col-md-3">
                    <div class="font-weight-bold text-2xl py-2">Graphic Design</div>
                </div>
            </div>
        </div>
    </div>
@endsection
