@extends('admin.admin')

@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Testimonials</h5>
      @if (session()->has('success'))
          <p class="alert alert-success">{{session('success')}}</p>
      @endif

      <!-- Bordered Table -->
      @if ($testimonials->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Lastname</th>
            <th scope="col">Role</th>
            <th scope="col">Testimonial</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($testimonials as $testimonial)
          <tr>
            <th scope="row">{{$testimonial->id}}</th>
            <td>{{$testimonial->name}}</td>
            <td>{{$testimonial->lastname}}</td>
            <td>{{$testimonial->role}}</td>
            <td>{{$testimonial->testimonial}}</td>
            <td>{{$testimonial->image}}</td>
            <td>{{$testimonial->created_at->diffForHumans()}}</td>
            <td class="d-flex"><a class="btn btn-primary btn-sm me-1" href="{{ route('admin-testimonials-edit', $testimonial->id)}}">Edit</a>

                <form action="{{route('admin-testimonials-delete' , $testimonial->id)}} " method="POST">
                    @csrf
                    @method('DELETE')

                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>

            </td>

            </tr>
          @endforeach
        </tbody>
      </table>
            {{$testimonials->links()}}
      @else
          <p class="lead">There are no products</p>
      @endif
      <!-- End Bordered Table -->


    </div>
  </div>

@endsection
