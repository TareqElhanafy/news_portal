@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Ad</h4>
        <form class="forms-sample" action="{{ route('admin.ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Ad Link</label>
                        <input type="text" class="form-control" name="link" id="exampleInputName1" value="{{ $ad->link }}" placeholder="Ad link">
                        @error('link')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Type</label>
                          <select name="type" class="form-control" id="exampleFormControlSelect2">
                              <option value="1" @if ($ad->type===1)
                                  selected
                              @endif>Horizontal Ad</option>
                              <option value="2" @if ($ad->type===2)
                                  selected
                              @endif>Vertical Ad</option>
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
            <input type="hidden" name="id" id="{{ $ad->id }}" value="{{ $ad->id }}">
            <br>
            <img src="{{ asset('storage/'.$ad->image) }}" style="height: 80px; width:80px;" id="image"  alt="">
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a class="btn btn-dark" href="{{ route('admin.ads') }}" >Cancel</a>
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
