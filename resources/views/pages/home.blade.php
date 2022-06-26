@extends('layouts.master')
@section('content')
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('/assets/images/slider2.jpeg') }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
              </div>
            </div>
          </div>
          <h3 class="mb-3">{{ __('product.latest_product') }}</h3>
          <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
              <div class="card">
                <img class="card-img-top" src="{{ asset('/storage/products/'.$product->image) }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <a href="{{ url('/product/detail/'. $product->id) }}" class="btn btn-primary">Go Details</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
@endsection