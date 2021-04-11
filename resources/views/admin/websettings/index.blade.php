@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Website general Settings</h4>
        <form class="forms-sample" action="{{ route('admin.settings.general.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Portal Logo</label>
            <input type="file" class="form-control" id="exampleInputName1" name="logo" value="{{ $settings->logo }}" onchange="readURL(this);">
            <img src="{{ asset('storage/'.$settings->logo) }}" style="height: 80px; width:80px;" id="image" alt="">
            <input type="hidden" name="id" id="{{ $settings->id }}" value="{{ $settings->id }}">
            @error('logo')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Portal Name</label>
            <input type="text" class="form-control" id="exampleInputName1" name="portal_name" value="{{ $settings->portal_name }}" placeholder="portal name">
            @error('portal_name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Address In English</label>
            <textarea class="form-control" name="address_en" placeholder="address in en" id="editor1" rows="4">{{ $settings->address_en }}</textarea>
            @error('address_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Address In Arabic</label>
            <textarea class="form-control" name="address_ar" placeholder="address in ar" id="editor2" rows="4">{{ $settings->address_ar }}</textarea>
            @error('address_ar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Portal Official Email</label>
            <input type="email" class="form-control" id="exampleInputName1" name="email" value="{{ $settings->email }}" placeholder="email">
            @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Portal Official Phone</label>
            <input type="text" class="form-control" id="exampleInputName1" name="phone" value="{{ $settings->phone }}" placeholder="phone">
            @error('phone')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
          <a href="{{ route('dashboard') }}" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>
  @section('scripts')
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'editor1' );
  </script>
    <script>
        CKEDITOR.replace( 'editor2' );
      </script>
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
