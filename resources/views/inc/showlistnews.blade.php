@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Show News</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            
            <div class="container-fluid">
                <div class ="float-right"><a href="{{ route('allnews.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Go back</a></div>
                <h2>ID : {{ $news->id }}</h2>
                @if( $news->photo )
                    <div class="image">
                        <img class="d-block mx-auto img-fluid border border-dark" style="width:450px" src="/storage/news/{{$news->photo}}">
                    </div><br>    
                @endif
                <ul class ="list-group">
                    <li class="list-group-item list-group-item-secondary"><b>Title :</b> {{ $news->title }}</li>
                    <li class="list-group-item list-group-item-secondary"><b>Category :</b> {{ optional($news->category)->title }}</li>
                    <li class="list-group-item list-group-item-secondary"><b>Author :</b> {{ $news->author }}</li>
                    <li class="list-group-item list-group-item-secondary"><b>Description :</b> {{ $news->description }}</li><br>
                </ul>
                <p class="float-right">Written by: {{ optional($news->user)->name }}</p>
            </div>
    </section>
@endsection