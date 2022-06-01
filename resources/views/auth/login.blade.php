@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')

    <div class="container">
        <div class="row" style="width: 400px;">
            <h1>Login</h1>
            <form action="{{ route('login-user') }}" method="POST">

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                @csrf
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
                    <button class="btn btn-block btn-primary" type="submit">Login</button>
                </div>
                
                <a href="/registration">You don't have acount !! Register here -> </a>

            </form>
        </div>
    </div>

@endsection