@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sub-Districts table</h4>
        <a href="{{ route('admin.subdistricts.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Sub-District</a>
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
                @foreach ($subdistricts as $subdistrict)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $subdistrict->name_en }} </td>
                    <td> {{ $subdistrict->name_ar }} </td>
                    <td> {{ $subdistrict->district->name_en }} </td>
                    <td>
                        <a href="{{ route('admin.subdistricts.edit', [$subdistrict->id, $subdistrict->name_en]) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.subdistricts.delete', [$subdistrict->id, $subdistrict->name_en]) }}" class="btn btn-danger btn-fw">Delete</a>
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
