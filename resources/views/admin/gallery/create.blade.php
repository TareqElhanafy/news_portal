@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Photo</h4>
        <form class="forms-sample" action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Image Title</label>
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
            <label>image</label>
            <br>
            <input type="file" name="image" class="form-control" onchange="readURL(this);">
            <br>
            <img src="" id="image"  alt="">
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
