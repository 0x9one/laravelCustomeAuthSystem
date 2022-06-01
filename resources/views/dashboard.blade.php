@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offeset-4 mt-2">
                <h4>Welcome to dashboard</h4>
                <hr>

                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actio</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td><a href="logout">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection