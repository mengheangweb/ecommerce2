@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ asset('/assets/products/'. $product->image) }}" style="width: 100%"/>
    </div>
    <div class="col-md-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name <span>{{ $product->name }}</span></li>
            <li class="list-group-item">Price <span>{{ $product->price }}</span></li>
        </ul>

        <a href="/order/{{ $product->id }}" class="btn btn-danger btn-block">Place Order</a>

        <div>
            {!! $product->description !!}
        </div>
    </div>
</div>
@endsection