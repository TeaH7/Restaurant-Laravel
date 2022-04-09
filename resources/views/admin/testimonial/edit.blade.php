@extends('admin.admin')

@section('content')


<form class="row g-3" method="POST" action="{{route('admin-testimonials-update' , $testimonial->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-12">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name" value="{{$testimonial->name}}">
    </div>
        <div class="col-12">
            <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{$testimonial->lastname}}">
    </div>
        <div class="col-12">
            <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="{{$testimonial->role}}">
    </div>
        <div class="col-12">
            <label for="testimonial" class="form-label">Testimonial</label>
            <textarea name="testimonial" class="form-control" cols="30" rows="10" placeholder="Type Something">{{$testimonial->testimonial}}</textarea>
    </div>
        <div class="col-12">
            <label for="image" class="form-label">Image</label>
             <input type="file" class="form-control" name="image" value="{{$testimonial->image}}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>

      </div>

@endsection
