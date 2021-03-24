@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Districts table</h4>
        <a href="{{ route('admin.districts.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New District</a>
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
                @foreach ($districts as $district)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $district->name_en }} </td>
                    <td> {{ $district->name_ar }} </td>
                    <td>
                        <a href="{{ route('admin.districts.edit', [$district->id, $district->name_en]) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.districts.delete', [$district->id, $district->name_en]) }}" class="btn btn-danger btn-fw">Delete</a>
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
