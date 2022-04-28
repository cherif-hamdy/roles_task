@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">Create User</div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name...">
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email...">
                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password...">
                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Your Password...">
                            </div>
                            <div class="form-group">
                                <label for="role">Select Role</label>
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-2">Create User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
