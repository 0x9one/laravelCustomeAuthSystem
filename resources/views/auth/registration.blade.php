@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')

    <div class="container">
        <div class="row" style="width: 400px;">
            <h1>Register</h1>
            <form action="{{ route('register-user') }}" method="POST">

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Full name</label>
                    <input type="text" name="name" class="form-control" id="name" 
                    value="{{ old('name') }}" placeholder="Write your Name">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" 
                    value="{{ old('email') }}" placeholder="Write your Email">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="*********">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
                
                <a href="/login">You already have acount !! Login here -> </a>

            </form>
        </div>
    </div>

@endsection