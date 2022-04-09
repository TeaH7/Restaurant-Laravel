@extends('admin.admin')


@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Products</h5>
      @if (session()->has('success'))
          <p class="alert alert-success">{{session('success')}}</p>
      @endif

      <!-- Bordered Table -->
      @if ($products->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Special</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->slug}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->is_special}}</td>
            <td>{{$product->image}}</td>
            <td>{{$product->created_at->diffForHumans()}}</td>
            <td class="d-flex"><a class="btn btn-primary btn-sm me-1" href="{{ route('admin-products-edit', $product->id)}}">Edit</a>

                <form action="{{route('admin-products-delete' , $product->id)}} " method="POST">
                    @csrf
                    @method('DELETE')

                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
                <a class="btn btn-success btn-sm ms-1" href="{{ route('admin-products-show', $product->slug)}}">Show</a>
            </td>

            </tr>
          @endforeach
        </tbody>
      </table>
            {{$products->links()}}
      @else
          <p class="lead">There are no products</p>
      @endif
      <!-- End Bordered Table -->


    </div>
  </div>
@endsection
