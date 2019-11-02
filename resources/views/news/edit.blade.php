@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit News</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            <div class="container-fluid">
                {!! Form::open(['action' => ['Admin\NewsController@update', $news->id] , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <div class="row">
                            {{Form::label('title', 'Title', ['class' => 'col-md-3'])}}
                            <div class="col-md-6">{{Form::text('title', $news->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{Form::label('category', 'Category', ['class' => 'col-md-3'])}}
                            <div class="col-md-6">{{Form::select('category_id', array_pluck( $categories , 'title','id'), $news->category_id, ['class' => 'form-control', 'placeholder' => 'Choose Category']) }}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{Form::label('author', 'Author', ['class' => 'col-md-3'])}}
                            <div class="col-md-6">{{Form::text('author', $news->author, ['class' => 'form-control', 'placeholder' => 'author'])}}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{Form::label('image', 'Image', ['class' => 'col-md-3'])}}
                            <div class="col-md-6">{{Form::file('photo')}}</div>
                            <div class="clearfix"></div>
                            @if( $news->photo )
                                
                                        
                                    <div class="col-md-3 offset-md-3"><img style="width:150px" src="/storage/news/{{$news->photo}}"></div>
                                    <div class="clearfix"></div>
                                
                                
                            @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                            {{Form::label('description', 'Description', ['class' => 'col-md-3'])}}
                            <div class="col-md-6">{{Form::textarea('description', $news->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Save', ['class' => 'btn btn-info'])}}
                            <div class ="float-right"><a href="{{ route('News.index')}}" class="btn btn-secondary">Go back</a></div>
                    </div>
                {!! Form::close() !!}
            </div>
    </section>
@endsection