@extends('admin.admin')

@section('content')

<form class="row g-3" method="POST" action="{{route('admin-categories-store')}}">
    @csrf
    <div class="col-12">
      <label for="name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Create</button>

    </div>
  </form>

@endsection
