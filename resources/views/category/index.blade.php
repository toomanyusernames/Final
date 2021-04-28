@extends('layouts.app')

@section('content')
    <div class="container row">
        <div class="col-sm-6">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('success') }}
                </div>
            @endif
            @foreach ($categories as $category)
                <div class="card border border-primary rounded">
                    <div class="card-body bg-primary">
                        {{ $category->name }}
                    </div>
                    <div class="card-footer">
                        <small><em>Created by {{ $category->user->name }}</em></small>
                    </div>
                </div>
                <br>
            @endforeach
            {{ $categories->links() }}
        </div>
        <div class="col-sm-6">
            <div class="card card-body bg-light">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name control-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your group name"
                            aria-describedby="helpId">

                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <input type="submit" value="Create" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>


@endsection
