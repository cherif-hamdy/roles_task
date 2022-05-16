@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        Welcome
                    </div>
                    <div class="card-body">
                        Welcome {{ auth()->guard('admin')->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
