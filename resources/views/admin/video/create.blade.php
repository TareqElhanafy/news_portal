@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Video</h4>
        <form class="forms-sample" action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Video Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="title">
                        @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Type</label>
                          <select name="type" class="form-control" id="exampleFormControlSelect2">
                              <option value="1">Big Photo</option>
                              <option value="0">Small Photo</option>
                          </select>
                          @error('type')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                     </div>
          <div class="form-group">
            <label>Video</label>
            <br>
            <input type="text" name="embed_link" class="form-control">
            <br>
            @error('embed_link')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a class="btn btn-dark" href="{{ route('admin.videos') }}" >Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
