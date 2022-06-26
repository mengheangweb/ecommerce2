@extends('layouts.master')
@section('content')
          <h3 class="mb-3">Products</h3>
          <div class="row mb-5">
            <div class="col-md-12">
              <a href="{{ route('product-listing') }}" class="btn btn-danger btn-lg mb-2">All</a>
              @foreach($categories as $category)
                <a href="{{ route('product-listing', ['c' => $category->id]) }}" class="btn btn-info btn-lg mb-2">({{ $category->product->count() }}) {{ $category->name }}</a>
              @endforeach
            </div>
          </div>
          <div class="row">
            @foreach($products as $product)
              <div class="col-md-3">
                <div class="card">
                  <img class="card-img-top" src="{{ asset('/storage/products/'.$product->image) }}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{ $product->name }} - <span class="text-danger">$ {{ $product->price }}</span></h5>
                    <a href="#" class="btn btn-primary">Go Details</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row mt-5">
            <div class="col-md-12">
              {{ $products->links() }}
            </div>
          </div>

@endsection