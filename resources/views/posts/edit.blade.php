@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Edit</div>

                    <div class="card-body">
                        <form action="{{ route('update', $post->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="totle" class="text-muted">Title</label>
                                <input id="title" type="text" value="{{ $post->title }}" name="title"
                                       class="form-control">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="text-muted">Body</label>
                                <textarea id="body" name="body" rows="10"
                                          class="form-control">{{ $post->body }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="tags" class="text-muted">Tags</label>
                                <select id="tags" type="text" name="tags[]" multiple class="form-control">
                                    
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                                @if($post->has_tag($tag->id)) selected @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('image')  ? ' has-error' : '' }}">
                                <label for="image" class="text-muted">Image</label>
                                <input id="image" type="file" src="/storage/{{ $post->image }}" name="image"
                                    class="file-chooser" accept="image/*">
                                
                                @if ($errors->has('image')   )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('publish') ? ' has-error' : '' }}">
                                <label for="publish" class="text-muted">Publish</label>

                                @if ( $post->publish == true)
                                    <input id="publish" type="checkbox" name="publish" checked>
                                @else
                                    <input id="publish" type="checkbox" name="publish" >
                                @endif

                                @if ($errors->has('publish'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publish') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-edit">update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
