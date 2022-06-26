@extends('admin.layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Product</h1>

<a href="{{ route('list-product') }} " class="btn btn-primary mb-3">Return</a>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">
          Add new product
      </div>
      <div class="card-body">
        <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter product name">
            @error('name')
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="name">Category</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category" id="exampleFormControlSelect1">
              <option value="">Choose</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            {{-- <input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter product name"> --}}
            @error('category')
            <div class="invalid-feedback">
              {{ $errors->first('category') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="name">Price</label>
            <input value="{{ old('price') }}" type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter product price">
            @error('price')
            <div class="invalid-feedback">
              {{ $errors->first('price') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="name">Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Browse product image">
            @error('image')
            <div class="invalid-feedback">
              {{ $errors->first('image') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"> {{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{ $errors->first('description') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tag">Tag</label>
            @foreach($tags as $tag)
            <div class="form-check">
              <input name="tag[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}">
              <label class="form-check-label">
                {{ $tag->name }}
              </label>
            </div>
            @endforeach
            @error('tag')
            <div class="invalid-feedback">
              {{ $errors->first('tag') }}
            </div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
  </div>
</div>


@endsection