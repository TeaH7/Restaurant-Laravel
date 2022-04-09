@extends('admin.admin')

@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Chefs</h5>
      @if (session()->has('success'))
          <p class="alert alert-success">{{session('success')}}</p>
      @endif

      <!-- Bordered Table -->
      @if ($chefs->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Lastname</th>
            <th scope="col">Role</th>
            <th scope="col">Image</th>
            <th scope="col">Facebook</th>
            <th scope="col">Instagram</th>
            <th scope="col">LinkedIn</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($chefs as $chef)
          <tr>
            <th scope="row">{{$chef->id}}</th>
            <td>{{$chef->name}}</td>
            <td>{{$chef->lastname}}</td>
            <td>{{$chef->role}}</td>
            <td>{{$chef->image}}</td>
            <td>{{$chef->facebook}}</td>
            <td>{{$chef->instagram}}</td>
            <td>{{$chef->linkedin}}</td>
            <td>{{$chef->created_at->diffForHumans()}}</td>
            <td class="d-flex"><a class="btn btn-primary btn-sm me-1" href="{{ route('admin-chefs-edit', $chef->id)}}">Edit</a>

                <form action="{{route('admin-chefs-delete' , $chef->id)}} " method="POST">
                    @csrf
                    @method('DELETE')

                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>

            </td>

            </tr>
          @endforeach
        </tbody>
      </table>
            {{$chefs->links()}}
      @else
          <p class="lead">There are no products</p>
      @endif
      <!-- End Bordered Table -->


    </div>
  </div>
@endsection
