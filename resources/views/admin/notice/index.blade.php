@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Notice Settings</h4>
        @if ($notice->status == 1)
        <a href="{{ route('admin.settings.notice.status') }}" class="btn btn-danger btn-fw">Deactivate</a>
        @else
        <a href="{{ route('admin.settings.notice.status') }}" class="btn btn-success btn-fw">Activate</a>
        @endif
        <br> <br>
        <form class="forms-sample" action="{{ route('admin.settings.notice.update', $notice->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Notice Body</label>
                <textarea class="form-control" name="notice_body" placeholder="notice body" id="editor1" rows="4">{{ $notice->notice_body }}</textarea>
                @error('notice_body')
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
