@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit photo</h4>
        <form class="forms-sample" action="{{ route('admin.photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Image Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $photo->title }}" id="exampleInputName1" placeholder="title">
                        @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Type</label>
                          <select name="type" class="form-control" id="exampleFormControlSelect2">
                              @if ($photo->type == 1)
                              <option value="1" selected>Big Photo</option>
                              <option value="0" >Small Photo</option>
                              @else
                              <option value="0" selected>Small Photo</option>
                              <option value="1">Big Photo</option>
                              @endif
                          </select>
                          @error('type')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                    </div>
          <div class="form-group">
            <label>image</label>
            <br>
            <input type="file" name="image" class="form-control" onchange="readURL(this);">
            <br>
            <img src="{{ asset('storage/'.$photo->image) }}" style="height: 80px; width:80px;" id="image"  alt="">
            <input type="hidden" name="id" value="{{ $photo->id }}" id="{{ $photo->id }}">
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a class="btn btn-dark" href="{{ route('admin.photos') }}" >Cancel</a>
        </form>
      </div>
    </div>
  </div>

  @section('scripts')
                <!--Previewing image -->
                <script type="text/javascript">
                    function readURL(input){
                      if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                          $('#image')
                          .attr('src', e.target.result)
                          .width(80)
                          .height(80);
                        };
                        reader.readAsDataURL(input.files[0]);
                      }
                    }
                </script>
  @endsection
@endsection
