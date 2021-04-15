@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="row">
      @php
          $todayPosts = DB::table('posts')->where('date', date('y-m-d'))->get();
          $monthPosts = DB::table('posts')->where('month', date('F'))->get();
          $totalViews = DB::table('posts')->sum('views');
      @endphp

      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Today's Total Posts</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{ $todayPosts->count() }} <p> posts for today</p></h2>
                </div>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Tooal Posts in the month</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                    <h2 class="mb-0">{{ $monthPosts->count() }} <p> posts in this month</p></h2>
                </div>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Total Views</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{ $totalViews }} <p>for all posts</p></h2>
                </div>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


