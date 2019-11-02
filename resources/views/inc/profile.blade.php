@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="image">
            <img src="{{ asset('dist/img/user-aymane.png') }}" class="d-block mx-auto rounded-circle border border-success" style="width:250px" alt="User Image">
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header bg-info">
                    <h3><b>Profile</b></h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>Name</b></h5><br>
                    <ul class ="list-group">
                        <li class="list-group-item list-group-item-secondary">{{ $user->name }}</li> 
                    </ul>
                    <br>
                    <h5 class="card-title"><b>Email</b></h5><br>
                    <ul class ="list-group">
                        <li class="list-group-item list-group-item-secondary">{{ $user->email }}</li> 
                    </ul>
                    <br>
                    <h5 class="card-title"><b>Created At</b></h5><br>
                    <ul class ="list-group">
                        <li class="list-group-item list-group-item-secondary">{{ $user->created_at }}</li> 
                    </ul>
                    <br>
                </div>
            </div>
        </div>
    </section>
@endsection