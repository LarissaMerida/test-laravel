@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <a href="{{ route('create') }}">create</a>
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
                                        
                                        
                                        
                                        <i class="fas fa-trash"></i>
                                        <i class="fas fa-bars"></i>
                                        <i class=""></i>
                                        <button class="btn btn-warning"> 
                                            <a href="{{ route('edit', $post->id) }}">edit</a>
                                        </button>
                                        <button class="btn btn-danger">
                                            <a href="{{ route('delete', $post->id) }}">Del</a>
                                        </button>
                                        
                                        
                                        
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
