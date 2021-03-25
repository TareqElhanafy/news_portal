@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Gallery table</h4>
        <a href="{{ route('admin.photos.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Photo</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Title </th>
                <th> Image </th>
                <th> Type </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($photos as $photo)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $photo->title }} </td>
                    <td>
                        <img src="{{ asset('storage/'.$photo->image) }}" style="height: 100px; width:100px;" alt="">
                         </td>
                    <td>
                        @if ($photo->type == 1 )
                        <span class="badge badge-success">Big Photo</span>
                        @else
                        <span class="badge badge-warning">Small Photo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.photos.edit', $photo->id) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.photos.delete', $photo->id) }}" class="btn btn-danger btn-fw">Delete</a>
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
