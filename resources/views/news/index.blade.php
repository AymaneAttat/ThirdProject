@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">News</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            <div class="container-fluid">
                <p>
                <a href="{{ route('News.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New News</a>
                </p>
                
                @if(count($news) > 0)
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($news as $n)
                            <tr>
                                @if(Auth::user()->id == $n->user_id)
                                    <td><a href="{{ route('News.show', $n->id) }}">{{ $n->id }}</a></td>
                                    <td>{{ $n->title }}</td>
                                    <td>{{ optional($n->category)->title }}</td>
                                    <td>{{ $n->author }}</td>
                                    <td>{{ $n->description }}</td>
                                    <td><div class="btn-group" role="group">
                                        <a href="{{ route('News.edit', $n->id) }}" class="btn btn-info btn-secondary">Edit</a> 
                                        {!!Form::open(['action' => ['Admin\NewsController@destroy', $n->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-secondary'])}}
                                        {!!Form::close()!!}
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    {{$news->links()}}
                @else 
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <tr><td colspan="5">No News Found</td></tr>
                    </table>
                @endif
                
            </div>
    </section>
@endsection
