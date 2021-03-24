@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit District</h4>
        <form class="forms-sample" action="{{ route('admin.districts.update',[$district->id, $district->name_en]) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name in English</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name_en" value="{{ $district->name_en }}" placeholder="name in english">
            @error('name_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Name in Arabic</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name_ar" value="{{ $district->name_ar }}" placeholder="name in arabic">
            @error('name_ar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{ route('admin.districts') }}" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
