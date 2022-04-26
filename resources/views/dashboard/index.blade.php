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
                @if(in_array('Super Admin', $role))
                    <li class="list-group-item"><a href="#">Category</a></li>
                    <li class="list-group-item"><a href="#">User</a></li>
                @endif
                @if(in_array('Super Admin', $role) || in_array('writer', $role))
                    <li class="list-group-item"><a href="#">Post</a></li>
                    <li class="list-group-item"><a href="#">Comment</a></li>
                @endif
                @if(in_array('Super Admin', $role) || in_array('sales', $role))
                    <li class="list-group-item"><a href="#">Product</a></li>
                @endif
                @if(in_array('Super Admin', $role) || in_array('teacher', $role) || in_array('student', $role))
                    <li class="list-group-item"><a href="#">Course</a></li>
                @endif
            </ul>

        </div>
    </div>
@endsection
