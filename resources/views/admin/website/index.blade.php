@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Websites table</h4>
        <a href="{{ route('admin.websites.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Website</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Website Name </th>
                <th> Website Link </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($websites as $website)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $website->name }} </td>
                    <td> {{ $website->link }} </td>
                    <td>
                        <a href="{{ route('admin.websites.edit', $website->id) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.websites.delete', $website->id) }}" class="btn btn-danger btn-fw">Delete</a>
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
