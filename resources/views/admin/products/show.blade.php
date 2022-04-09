@extends('admin.admin')

@section('content')
<div class="card mb-3">
    <img src="{{ asset('storage/' . $product->image)}}" class="card-img-top" alt="{{$product->name}}">
    <div class="card-body">
      <h5 class="card-title">{{ucfirst($product->name)}}</h5>
      <p class="card-text">{{$product->ingredients}}</p>
      <p class="card-text">{{$product->description}}</p>
      <p class="card-text">$ {{$product->price}}</p>
      <p class="card-text"><small class="text-muted">{{$product->updated_at->diffForHumans()}}</small></p>
    </div>
  </div>
@endsection
