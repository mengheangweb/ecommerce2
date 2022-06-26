@extends('admin.layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Product</h1>

<a href="{{ route('create-product') }} " class="btn btn-primary">Add New</a>
<form action="{{ route('list-product') }}" method="get" style="width: 300px; float: right;">
  <div class="input-group mb-3">
    <input value="{{ request()->has('search') ? request('search') : '' }}" name="search" type="text" class="form-control" placeholder="Type product name here" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </div>
</form>
<table class="table product-table mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Tags</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row"></th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category ? $product->category->name : '--' }}</td>
        <td>{{ $product->price }}</td>
        <td><img width="50" src="{{ asset('/storage/products/'. $product->image) }}"/></td>
        <td>
          @foreach($product->tag as $tag)
          <span class="badge badge-secondary">{{ $tag->name }}</span>
          @endforeach
        </td>
        <td>
          <a class="btn btn-info" href="{{ route('detial-product', $product->id) }}"> View</a>
          <a class="btn btn-success" href="{{ route('edit-product', $product->id) }}"> Edit</a>
          <form action="{{ route('delete-product', $product->id) }} " method="post" style="width: 300px; float: right;">
            @method('DELETE')
            @csrf
            <input type="hidden">
            <button type="submit" onclick=" return confirm('Are you sure?') " class="btn btn-danger" name="submit">Delete</button>
          </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{{ $products->appends($_GET)->links() }}

<h3>Bin</h3>
<ul>
  @foreach($soft_deletes as $deleted)
    <li>{{ $deleted->name }} <a class="text-primary" href="{{ route('restore-product', $deleted->id) }}">Restore</a></li>
  @endforeach
</ul>

@endsection