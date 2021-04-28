@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-header bg-danger">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        welcome {{ Auth::user()->name }}
                        <img src="{{ Auth::user()->profile_picture }}" alt="">
                    </div>

                    <ul class="nav nav-pills mb-3 bg-dark rounded" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-posts-tab" data-toggle="pill" href="#pills-posts"
                                role="tab" aria-controls="pills-posts" aria-selected="true">posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-comments-tab" data-toggle="pill" href="#pills-comments" role="tab"
                                aria-controls="pills-comments" aria-selected="false">comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-category-tab" data-toggle="pill" href="#pills-category" role="tab"
                                aria-controls="pills-category" aria-selected="false">categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-liked-tab" data-toggle="pill" href="#pills-liked" role="tab"
                                aria-controls="pills-liked" aria-selected="false">liked</a>
                        </li>
                    </ul>
                    <div class="container">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-posts" role="tabpanel"
                                aria-labelledby="pills-posts-tab">
                                <em>{{ Auth::user()->posts()->count() }} Post created</em>
                                @foreach (Auth::user()->posts as $post)
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                {{ $post->title }}
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            {{ $post->body }}
                                        </div>
                                    </div>
                                    <div class="pb-3"></div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="pills-comments" role="tabpanel"
                                aria-labelledby="pills-comments-tab">
                                comment
                            </div>
                            <div class="tab-pane fade" id="pills-liked" role="tabpanel" aria-labelledby="pills-liked-tab">
                                liked
                            </div>
                            <div class="tab-pane fade" id="pills-category" role="tabpanel" aria-labelledby="pills-category-tab">
                                <em>{{ Auth::user()->categories()->count() }} Categories created</em>
                                 @foreach (Auth::user()->categories as $category)
                                    <div class="card">
                                        <div class="card-body">
                                            {{ $category->name }}
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
