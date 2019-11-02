@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Categories</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            <div class="container-fluid">
                {!! Form::open(['action' => ['Admin\CategoriesController@update', $categories->id] , 'method' => 'POST']) !!}
                    <div class="form-group">
                        <div class="row">
                            {{Form::label('title', 'Title', ['class' => 'col-md-3'])}}
                            <div class="col-md-6">{{Form::text('title', $categories->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Save', ['class' => 'btn btn-info'])}}
                            <div class ="float-right"><a href="{{ route('categories.index')}}" class="btn btn-secondary">Go back</a></div>
                    </div>
                {!! Form::close() !!}
            </div>
    </section>
@endsection