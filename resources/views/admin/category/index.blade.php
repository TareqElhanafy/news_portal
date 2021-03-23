@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Categories table</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Category</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Name in English </th>
                <th> Name in Arabic </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $category->name_en }} </td>
                    <td> {{ $category->name_ar }} </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', [$category->id,$category->name_en]) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a href="{{ route('admin.categories.delete', [$category->id,$category->name_en]) }}" class="btn btn-danger btn-fw">Delete</a>
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
