@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Show Categories</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            <div class="container-fluid">
                <div class ="float-right"><a href="{{ route('categories.index')}}" class="btn btn-secondary">Go back</a></div>
                <h2>ID : {{ $categories->id }}</h2>
                <ul class ="list-group">
                    <li class="list-group-item list-group-item-secondary">Title : {{ $categories->title }} <p class="float-right">written by: {{ optional($categories->user)->name }}</p></li> 
                </ul>
            </div>
    </section>
@endsection