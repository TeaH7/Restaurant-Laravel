@extends('admin.admin')


@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Contacts</h5>
      @if (session()->has('success'))
          <p class="alert alert-success">{{session('success')}}</p>
      @endif

      <!-- Bordered Table -->
      @if ($contacts->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
          <tr>
            <th scope="row">{{$contact->id}}</th>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->subject}}</td>
            <td>{{$contact->message}}</td>
            <td>{{$contact->created_at->diffForHumans()}}</td>

            <td class="d-flex">
                <form action="{{route('admin-contact-delete' , $contact->id)}} " method="POST">
                    @csrf
                    @method('DELETE')

                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
                <a class="btn btn-success btn-sm ms-1" href="{{ route('admin-contact-show', $contact->id)}}">Show</a>
            </td>


            </tr>
          @endforeach
        </tbody>
      </table>
            {{$contacts->links()}}
      @else
          <p class="lead">There are no messages</p>
      @endif
      <!-- End Bordered Table -->


    </div>
  </div>

@endsection
