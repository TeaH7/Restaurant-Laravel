@extends('admin.admin')

@section('content')

<form class="row g-3" method="POST" action="{{route('admin-chefs-update' , $chef->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-12">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name" value="{{$chef->name}}">
    </div>
        <div class="col-12">
            <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{$chef->lastname}}">
    </div>
        <div class="col-12">
            <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="{{$chef->role}}">
    </div>
        <div class="col-12">
            <label for="image" class="form-label">Image</label>
             <input type="file" class="form-control" name="image" value="{{$chef->image}}">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Facebook</span>
        </div>
        <input type="url" class="form-control" placeholder="Url" aria-label="facebook" aria-describedby="basic-addon1" name="facebook" value="{{$chef->facebook}}">
      </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Instagram</span>
        </div>
        <input type="url" class="form-control" placeholder="Url" aria-label="instagram" aria-describedby="basic-addon1" name="instagram" value="{{$chef->instagram}}">
      </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">LinkedIn</span>
        </div>
        <input type="url" class="form-control" placeholder="Url" aria-label="linkedin" aria-describedby="basic-addon1" name="linkedin" value="{{$chef->linkedin}}">
      </div>


    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>

      </div>

@endsection
