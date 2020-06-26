@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <a href="{{ route('create') }}" class="create">
                            <span class="glyphicon glyphicon-download-alt"></span>
                        </a>
                      
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        
                                        <a href="{{ route('edit', $post->id) }}" class="edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                       
                                        <a href="{{ route('delete', $post->id) }}" class="delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
