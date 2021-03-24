@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub-Categories table</h4>
        <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Sub-Category</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Name in English </th>
                <th> Name in Arabic </th>
                <th> Category Name </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($subcategories as $subcategory)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $subcategory->name_en }} </td>
                    <td> {{ $subcategory->name_ar }} </td>
                    <td> {{ $subcategory->category->name_en }} </td>
                    <td>
                        <a href="{{ route('admin.subcategories.edit', [$subcategory->id,$subcategory->name_en]) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.subcategories.delete', [$subcategory->id,$subcategory->name_en]) }}" class="btn btn-danger btn-fw">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
