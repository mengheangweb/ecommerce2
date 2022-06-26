@extends('admin.layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">User</h1>

<a href="{{ route('create-user') }} " class="btn btn-primary">Add New</a>
<form action="{{ route('list-user') }}" method="get" style="width: 300px; float: right;">
  <div class="input-group mb-3">
    <input value="{{ request()->has('search') ? request('search') : '' }}" name="search" type="text" class="form-control" placeholder="Type user name here" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </div>
</form>
<table class="table user-table mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row"></th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <a class="btn btn-success" href="{{ route('edit-user', $user->id) }}"> Edit</a>
          <form action="{{ route('delete-user', $user->id) }} " method="post" style="width: 300px; float: right;">
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
{{ $users->appends($_GET)->links() }}

@endsection