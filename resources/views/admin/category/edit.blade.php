@extends('admin.admin')

@section('content')

<form class="row g-3" method="POST" action="{{route('admin-categories-update' , $category->id)}}" >
    @csrf
    @method('PATCH')
    <div class="col-12">
      <label for="name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Update</button>

    </div>
  </form>

@endsection
