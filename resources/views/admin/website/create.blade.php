@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Website</h4>
        <form class="forms-sample" action="{{ route('admin.websites.store') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Website Name</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="website name">
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
           @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Website Link</label>
            <input type="text" class="form-control" id="exampleInputName1" name="link" placeholder="website link">
            @error('link')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{ route('admin.websites') }}" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
