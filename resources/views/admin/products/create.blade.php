@extends('admin.admin')

@section('content')

<form class="row g-3" method="POST" action="{{route('admin-products-store')}}" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="col-12">
      <label for="ingredients" class="form-label">Ingredients</label>
      <input type="text" class="form-control" id="ingredients" name="ingredients">
    </div>
    <div class="col-12">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
    </div>
    <div class="col-12" >
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price">
      </div>
    <div class="col-12">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Is Special?</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="is_special">
            <option selected value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="category_id">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

          </select>
        </div>
      </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Create</button>

    </div>
  </form>

@endsection
