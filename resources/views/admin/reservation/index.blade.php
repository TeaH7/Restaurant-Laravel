@extends('admin.admin')


@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">All Reservations</h5>
      @if (session()->has('success'))
          <p class="alert alert-success">{{session('success')}}</p>
      @endif

      <!-- Bordered Table -->
      @if ($reservations->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Date of Reservation</th>
            <th scope="col">Time of Reservation</th>
            <th scope="col">Nr of people</th>
            <th scope="col">Message</th>
            <th scope="col">Reserved</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($reservations as $reservation)
          <tr>
            <th scope="row">{{$reservation->id}}</th>
            <td>{{$reservation->fullname}}</td>
            <td>{{$reservation->email}}</td>
            <td>{{$reservation->phone}}</td>
            <td>{{$reservation->date}}</td>
            <td>{{$reservation->time}}</td>
            <td>{{$reservation->nr_of_people}}</td>
            <td>{{$reservation->message}}</td>
            <td>{{$reservation->status}}</td>
            <td>{{$reservation->created_at->diffForHumans()}}</td>
            <td class="d-flex"><a class="btn btn-primary btn-sm me-1" href="{{ route('admin-reservation-edit', $reservation->id)}}">Edit</a>

                <form action="{{route('admin-reservation-delete' , $reservation->id)}} " method="POST">
                    @csrf
                    @method('DELETE')

                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>

            </td>

            </tr>
          @endforeach
        </tbody>
      </table>
            {{$reservations->links()}}
      @else
          <p class="lead">There are no reservations</p>
      @endif
      <!-- End Bordered Table -->


    </div>
  </div>

@endsection
