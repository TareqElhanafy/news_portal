@extends('layouts.admin')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Posts table</h4>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-fw" style="float: right;">Add New Post</a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> Title in English </th>
                <th> Category Name </th>
                <th> District Name </th>
                <th> Image </th>
                <th> Post Date </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{str_limit( $post->title_en, $limit=10) }} </td>
                    <td> {{ $post->category->name_en }} </td>
                    <td> {{ $post->district->name_en }} </td>
                    <td>
                        <img src="{{ asset('storage/'.$post->image) }}" style="height: 100px; width:100px;" alt="">
                    </td>
                    <td> {{Carbon\Carbon::parse($post->created_at)->diffForHumans() }} </td>

                    <td>
                        <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-warning btn-fw">Edit</a>
                        <a id="delete" href="{{ route('admin.posts.delete', $post->id) }}" class="btn btn-danger btn-fw">Delete</a>
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
