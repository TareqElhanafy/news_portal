@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Video</h4>
        <form class="forms-sample" action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Video Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $video->title }}" id="exampleInputName1" placeholder="title">
                        @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Type</label>
                          <select name="type" class="form-control" id="exampleFormControlSelect2">
                              @if ($video->type == 1)
                              <option value="1" selected>Big video</option>
                              <option value="0" >Small video</option>
                              @else
                              <option value="0" selected>Small video</option>
                              <option value="1">Big video</option>
                              @endif
                          </select>
                          @error('type')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                    </div>
          <div class="form-group">
            <label>Embed Link</label>
            <br>
            <input type="test" name="embed_link" class="form-control" value="{{ $video->embed_link }}">
            <br>
            @error('embed_link')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Save</button>
          <a class="btn btn-dark" href="{{ route('admin.videos') }}" >Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
