@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Sub-Category</h4>
        <form class="forms-sample" action="{{ route('admin.subcategories.update',[$subcategory->id,$subcategory->name_en]) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name in English</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name_en" value="{{ $subcategory->name_en }}" placeholder="name in english">
            @error('name_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Name in Arabic</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name_ar" value="{{ $subcategory->name_ar }}" placeholder="name in arabic">
            @error('name_ar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Choose Category</label>
              <select name="category_id" class="form-control" id="exampleFormControlSelect2">
                  <option disabled selected>--Select Category</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if ($category->id == $subcategory->category->id)
                    selected
                  @endif>{{ $category->name_en }}</option>
                  @endforeach
              </select>
              @error('category_id')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
              @enderror
         </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{ route('admin.subcategories') }}" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
