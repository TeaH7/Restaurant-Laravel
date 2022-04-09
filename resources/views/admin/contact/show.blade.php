@extends('admin.admin')

@section('content')
<div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{$contact->name}}</h5>
      <p class="card-text">{{$contact->email}}</p>
      <p class="card-text">{{$contact->subject}}</p>
      <p class="card-text">{{$contact->message}}</p>
      <p class="card-text"><small class="text-muted">{{$contact->created_at->diffForHumans()}}</small></p>
    </div>
  </div>
@endsection
