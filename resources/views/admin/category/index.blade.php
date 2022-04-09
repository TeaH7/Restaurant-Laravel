@extends('admin.admin')

@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Categories</h5>
      @if (session()->has('success'))
          <p class="alert alert-success">{{session('success')}}</p>
      @endif

      <!-- Bordered Table -->
      @if ($categories->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->created_at->diffForHumans()}}</td>
            <td class="d-flex"><a class="btn btn-primary btn-sm me-1" href="{{ route('admin-categories-edit', $category->id)}}">Edit</a>

                <form action="{{route('admin-categories-delete' , $category->id)}} " method="POST">
                    @csrf
                    @method('DELETE')

                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>

          </tr>


          @endforeach
        </tbody>
      </table>
            {{$categories->links()}}
      @else
          <p class="lead">There are no categories</p>
      @endif
      <!-- End Bordered Table -->


    </div>
  </div>

@endsection
