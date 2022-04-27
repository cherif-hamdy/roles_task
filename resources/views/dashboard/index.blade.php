@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">{{ $user->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-3">
            <div class="text-center mt-3">
                <h3>Dashboard</h3>
            </div>
            <ul class="list-group text-center">
                @can('Category')
                    <li class="list-group-item"><a href="#">Category</a></li>
                @endcan
                @can('User')
                    <li class="list-group-item"><a href="#">User</a></li>
                @endcan
                @can('Comment')
                    <li class="list-group-item"><a href="#">Comment</a></li>
                @endcan
                @can('Post')
                    <li class="list-group-item"><a href="#">Post</a></li>
                @endcan
                @can('Product')
                    <li class="list-group-item"><a href="#">Product</a></li>
                @endcan
                @can('Course')
                    <li class="list-group-item"><a href="#">Course</a></li>
                @endcan
            </ul>

        </div>
    </div>
@endsection
