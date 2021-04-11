@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">LiveTv Settings</h4>
        @if ($livetv->status == 1)
        <a href="{{ route('admin.settings.livetv.status') }}" class="btn btn-danger btn-fw">Deactivate</a>
        @else
        <a href="{{ route('admin.settings.livetv.status') }}" class="btn btn-success btn-fw">Activate</a>
        @endif
        <br> <br>
        <form class="forms-sample" action="{{ route('admin.settings.livetv.update', $livetv->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Embed Link</label>
                <input type="text" value="{{ $livetv->embed_link }}" name="embed_link" class="form-control">
                @error('embed_link')
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
  @endsection
@endsection
