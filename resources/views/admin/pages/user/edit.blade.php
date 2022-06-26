@extends('admin.layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create</h1>

<a href="{{ route('list-product') }} " class="btn btn-primary mb-3">Return</a>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header">
          Add new user
      </div>
      <div class="card-body">
        <form action="{{ route('update-user', $user->id) }}" method="post" enctype="multipart/form-data">
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
            <label for="email">Email</label>
            <input value="{{ old('email') }}" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter user email">
            @error('email')
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">password</label>
            <input value="{{ old('password') }}" type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="name" placeholder="Enter password">
            @error('password')
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="name">Confirm Password</label>
            <input value="{{ old('password_confirmation') }}" type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="name" placeholder="Enter Password Confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">
              {{ $errors->first('password_confirmation') }}
            </div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
  </div>
  </div>
</div>


@endsection