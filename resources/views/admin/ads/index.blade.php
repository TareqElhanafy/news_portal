@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ads table</h4>
        <a href="{{ route('admin.ads.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Ad</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Link </th>
                <th> Image </th>
                <th> Type </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($ads as $ad)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $ad->link }} </td>
                    <td>
                        <img src="{{ asset('storage/'.$ad->image) }}" style="height: 100px; width:100px;" alt="">
                         </td>
                    <td>
                        @if ($ad->type == 1 )
                        <span class="badge badge-success">Horizontal Ad</span>
                        @else
                        <span class="badge badge-warning">Vertical Ad</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.ads.edit', $ad->id) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.ads.delete', $ad->id) }}" class="btn btn-danger btn-fw">Delete</a>
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
