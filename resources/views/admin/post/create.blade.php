@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Post</h4>
        <form class="forms-sample" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Title in English</label>
                        <input type="text" class="form-control" name="title_en" id="exampleInputName1" placeholder="title in en">
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Title in Arabic</label>
                        <input type="text" class="form-control" name="title_ar" id="exampleInputName1" placeholder="title in ar">
                      </div>
                </div>
            </div>
            @php
                $categories = App\Category::all()
            @endphp
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Category</label>
                          <select name="category_id" class="form-control" id="exampleFormControlSelect2">
                              <option disabled selected>--Select Category</option>
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                              @endforeach
                          </select>
                          @error('category_id')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                     </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Sub-Category</label>
                          <select name="subcategory_id" class="form-control" id="exampleFormControlSelect2">
                          </select>
                          @error('subcategory_id')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                     </div>
                </div>
            </div>
            @php
            $districts = App\District::all()
           @endphp
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Choose District</label>
                          <select name="district_id" class="form-control" id="exampleFormControlSelect2">
                              <option disabled selected>--Select District</option>
                              @foreach ($districts as $district)
                              <option value="{{ $district->id }}">{{ $district->name_en }}</option>
                              @endforeach
                          </select>
                          @error('district_id')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                     </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Sub-District</label>
                          <select name="subdistrict_id" class="form-control" id="exampleFormControlSelect2">
                          </select>
                          @error('subdistrict_id')
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                           @enderror
                     </div>
                </div>
            </div>
          <div class="form-group">
            <label>image</label>
            <br>
            <input type="file" name="image" class="form-control">
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Details in English</label>
            <textarea class="form-control" name="details_en" id="editor1" rows="4"></textarea>
            @error('details_en')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Details in Arabic</label>
            <textarea class="form-control" name="details_ar" id="editor2" rows="4"></textarea>
            @error('details_ar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
             @enderror
          </div>
<br><br>
          <div class="row">
              <div class="col-3">
                  <label for="">headline</label>
                  <input type="checkbox" name="headline" id="" value="1">
              </div>
              <div class="col-3">
                <label for="">first section</label>
                <input type="checkbox" name="first_section" id="" value="1">
            </div>
            <div class="col-3">
                <label for="">first section thumbnail</label>
                <input type="checkbox" name="first_section_thumbnail" id="" value="1">
            </div>
            <div class="col-3">
                <label for="">bigthumbnail</label>
                <input type="checkbox" name="bigthumbnail" id="" value="1">
            </div>
          </div>
          <br><br>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
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
      <!--Loading subcategories with ajax -->
<script type="text/javascript">
    $(document).ready(function(){
   $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {
          $.ajax({
            url: "{{ url('/admin/categories/get/subcategories/') }}/"+category_id,
            type:"GET",
            dataType:"json",
            success:function(data) {
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){
            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.name_en + '</option>');
            });
            },
          });
        }else{
          alert('danger');
        }
          });
    });
</script>
      <!--Loading subdistricts with ajax -->
      <script type="text/javascript">
        $(document).ready(function(){
       $('select[name="district_id"]').on('change',function(){
            var district_id = $(this).val();
            if (district_id) {
              $.ajax({
                url: "{{ url('/admin/districts/get/subdistricts/') }}/"+district_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                var d =$('select[name="subdistrict_id"]').empty();
                $.each(data, function(key, value){
                $('select[name="subdistrict_id"]').append('<option value="'+ value.id + '">' + value.name_en + '</option>');
                });
                },
              });
            }else{
              alert('danger');
            }
              });
        });
    </script>
  @endsection
@endsection
