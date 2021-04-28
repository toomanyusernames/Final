@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>

              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('images\grassland lacking.jpeg') }}" width="100%" height="700" class="">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images\house.jpeg') }}" width="100%" height="700">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images\stadium.jpeg') }}" width="100%" height="700">
                </div>
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>

        </div>

    </div>
@endsection
