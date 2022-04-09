@extends('admin.admin')

@section('content')

<form class="row g-3" method="POST" action="{{route('admin-reservation-update' , $reservation->id)}}">
    @csrf
    @method('PATCH')
    <div class="col-12">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="{{$reservation->date}}">
    </div>
        <div class="col-12">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{$reservation->time}}">
        </div>
        <div class="col-12">
            <label for="nr_of_people" class="form-label">Nr of People</label>
            <input type="number" class="form-control" id="nr_of_people" name="nr_of_people" value="{{$reservation->nr_of_people}}">
        </div>

      <div class="row mt-3 mb-3">
        <label class="col-sm-2 col-form-label">Reserved</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="status">
            @if ($reservation->status == 'no')
                <option selected value="no">No</option>
                <option value="yes">Yes</option>

                @else
                <option selected value="yes">Yes</option>
                <option value="no">No</option>
            @endif

          </select>
        </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Update</button>

      </div>

@endsection
