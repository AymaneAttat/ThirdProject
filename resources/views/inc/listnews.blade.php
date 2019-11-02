@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">All News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active">All News</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
            <div class="container-fluid">
                
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
                                <td>{{ $n->id }}</td>
                                <td>{{ $n->title }}</td>
                                <td>{{ optional($n->category)->title }}</td>
                                <td>{{ $n->author }}</td>
                                <td>{{ $n->description }}</td>
                                <td><div class="btn-group" role="group">
                                    <a href="{{ route('allnews.show', $n->id) }}"><i class="fas fa-book"></i></a>
                                    
                                    </div>
                                </td>
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
