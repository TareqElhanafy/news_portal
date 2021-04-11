@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Social Settings</h4>
        <form class="forms-sample" action="{{ route('admin.settings.social.update', $social->id) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Facebook</label>
            <input type="text" class="form-control" id="exampleInputName1" name="facebook" value="{{ $social->facebook }}" placeholder="facebook link">
            @error('facebook')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Twitter</label>
            <input type="text" class="form-control" id="exampleInputName1" name="twitter" value="{{ $social->twitter }}" placeholder="twitter link">
            @error('twitter')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>          <div class="form-group">
            <label for="exampleInputName1">Youtube</label>
            <input type="text" class="form-control" id="exampleInputName1" name="youtube" value="{{ $social->youtube }}" placeholder="youtube link">
            @error('youtube')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>          <div class="form-group">
            <label for="exampleInputName1">Instagram</label>
            <input type="text" class="form-control" id="exampleInputName1" name="instagram" value="{{ $social->instagram }}" placeholder="instagram link">
            @error('instagram')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>          <div class="form-group">
            <label for="exampleInputName1">Linkedin</label>
            <input type="text" class="form-control" id="exampleInputName1" name="linkedin" value="{{ $social->linkedin }}" placeholder="linkedin link">
            @error('linkedin')
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
@endsection
