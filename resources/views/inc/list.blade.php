@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Users List</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-info"><b>List</b></div>
                            <div class="card-body">
                                    <table class="table">
                                            <thead class="thead-light">
                                              <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Info</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user )
                                                    <tr>
                                                        <th scope="row"> {{ $user->name }}</th>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td><a href="{{ route('list.show', $user->id) }}" class="btn btn-secondary"><i class="fas fa-book"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class ="float-right"><a href="/home" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Go back</a></div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection