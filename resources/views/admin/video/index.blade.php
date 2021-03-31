@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Videos Gallery table</h4>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Video</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Title </th>
                <th> Embed Link </th>
                <th> Type </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($videos as $video)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $video->title }} </td>
                    <td>
                        {{ $video->embed_link }}
                         </td>
                    <td>
                        @if ($video->type == 1 )
                        <span class="badge badge-success">Big Video</span>
                        @else
                        <span class="badge badge-warning">Small Video</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.videos.delete', $video->id) }}" class="btn btn-danger btn-fw">Delete</a>
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
