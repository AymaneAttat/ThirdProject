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
                <div class ="float-right"><a href="{{ route('News.index')}}" class="btn btn-secondary">Go back</a></div>
                <h2>ID : {{ $news->id }}</h2>
                <ul class ="list-group">
                    <li class="list-group-item"><b>Title :</b> {{ $news->title }}</li>
                    <li class="list-group-item"><b>Category :</b> {{ optional($news->category)->title }}</li>
                    <li class="list-group-item"><b>Author :</b> {{ $news->author }}</li>
                    @if( $news->photo ) 
                        <li class="list-group-item"><b>Image : <img style="width:70%" src="/storage/news/{{$news->photo}}"><br></li>
                    @endif
                    <li class="list-group-item"><b>Description :</b> {{ $news->description }}</li><br>
                </ul>
            </div>
    </section>
@endsection