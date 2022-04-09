@extends('admin.admin')

@section('content')

<form class="row g-3" method="POST" action="{{route('admin-chefs-store')}}" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name">
    </div>
        <div class="col-12">
            <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
        <div class="col-12">
            <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role">
    </div>
        <div class="col-12">
            <label for="image" class="form-label">Image</label>
             <input type="file" class="form-control" name="image">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Facebook</span>
        </div>
        <input type="url" class="form-control" placeholder="Url" aria-label="facebook" aria-describedby="basic-addon1" name="facebook" >
      </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Instagram</span>
        </div>
        <input type="url" class="form-control" placeholder="Url" aria-label="instagram" aria-describedby="basic-addon1" name="instagram" >
      </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">LinkedIn</span>
        </div>
        <input type="url" class="form-control" placeholder="Url" aria-label="linkedin" aria-describedby="basic-addon1" name="linkedin" >
      </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Create</button>

      </div>

@endsection
