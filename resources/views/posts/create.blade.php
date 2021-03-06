@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Create</div>

                    <div class="card-body">
                        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="text-muted">Title</label>
                                <input id="title" type="text" name="title" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="text-muted">Body</label>
                                <textarea id="body" name="body" rows="10" class="form-control"></textarea>
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
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                <input id="image" type="file" src="" name="image"
                                    class="file-chooser" accept="image/*">
                                
                                @if ($errors->has('image')   )
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('publish') ? ' has-error' : '' }}">
                                <label for="publish" class="text-muted">Publish</label>
                                <input id="publish" type="checkbox" name="publish" >

                                @if ($errors->has('publish'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publish') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-create">store</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
