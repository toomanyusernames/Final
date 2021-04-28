@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-sm-3 ">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="" method="post" enctype="multipart/form-data ">

                {{ csrf_field() }}

                <div class="card">
                    <div class="card-header">
                        Header
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <input type="text" name="title" class="form-control" placeholder="enter your title">
                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <textarea name="body" id="" cols="63" rows="8" class="form-control"
                                placeholder="enter your post"></textarea>
                            @if ($errors->has('body'))
                                <small class="text-danger">{{ $errors->first('body') }}</small>
                            @endif
                        </div>
                        <div class="form-group">

                            <select class="form-control" name="category" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Post" class="btn btn-success btn-block">
                    </div>
                </div>


            </form>
            @foreach ($posts as $post)
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Created by {{ $post->user->name }}{{ $post->title }}
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($post->image != null)
                            <img src="/images/{{ $post->image }}" alt="Image" width="100%" height="300">
                        @endif
                        {{ $post->body }}
                        <br>
                        <div class="badge">{{ $post->category->name }}</div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-link">Like</a>
                        <a href="#" class="btn btn-link">Dislike</a>
                        <a href="#" class="btn btn-link">Comment</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
