@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Seos Settings</h4>
        <form class="forms-sample" action="{{ route('admin.settings.seo.update', $seo->id) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">meta title</label>
            <input type="text" class="form-control" id="exampleInputName1" name="meta_title" value="{{ $seo->meta_title }}" placeholder="meta title">
            @error('meta_title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">meta author</label>
            <input type="text" class="form-control" id="exampleInputName1" name="meta_author" value="{{ $seo->meta_author }}" placeholder="meta author">
            @error('meta_author')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">meta description</label>
            <textarea class="form-control" name="meta_description" placeholder="meta tag" id="editor1" rows="4">{{ $seo->meta_description }}</textarea>
            @error('meta_description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">meta tag</label>
            <input type="text" class="form-control" id="exampleInputName1" name="meta_tag" value="{{ $seo->meta_tag }}" placeholder="meta tag">
            @error('meta_tag')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
           <div class="form-group">
            <label for="exampleInputName1">googl analytics</label>
            <input type="text" class="form-control" id="exampleInputName1" name="google_analytics" value="{{ $seo->google_analytics }}" placeholder="google analytics">
            @error('google_analytics')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">bing analytics</label>
            <input type="text" class="form-control" id="exampleInputName1" name="bing_analytics" value="{{ $seo->bing_analytics }}" placeholder="bing analytics">
            @error('bing_analytics')
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
