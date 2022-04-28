@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-2">
                <a href="{{ route('users.create') }}" class="btn btn-success mb-2">Create</a>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $value)
                                                    <p>{{ $value }}</p>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
