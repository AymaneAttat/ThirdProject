@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            <div class="container-fluid">
                <p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Category</a>
                </p>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                        @foreach ($categories as $c)
                            <tr>
                                @if(Auth::user()->id == $c->user_id)
                                    <td><a href="{{ route('categories.show', $c->id) }}">{{ $c->id }}</a></td>
                                    <td>{{ $c->title }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <p>
                                                <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-info">Edit </a> 
                                                {!!Form::open(['action' => ['Admin\CategoriesController@destroy', $c->id], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!} 
                                            </p>      
                                        </div>
                                    </td> 
                                @endif
                            </tr>
                        @endforeach
                </table>
                {{$categories->render()}}
            </div>
    </section>
@endsection
