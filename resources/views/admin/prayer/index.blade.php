@extends('layouts.admin')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Prayers Settings</h4>
        <form class="forms-sample" action="{{ route('admin.settings.prayer.update', $prayer->id) }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Fajr</label>
            <input type="text" class="form-control" id="exampleInputName1" name="fajr" value="{{ $prayer->fajr }}" placeholder="fajr">
            @error('fajr')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Duhr</label>
            <input type="text" class="form-control" id="exampleInputName1" name="duhr" value="{{ $prayer->duhr }}" placeholder="duhr">
            @error('duhr')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
           <div class="form-group">
            <label for="exampleInputName1">Asr</label>
            <input type="text" class="form-control" id="exampleInputName1" name="asr" value="{{ $prayer->asr }}" placeholder="asr">
            @error('asr')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Instagram</label>
            <input type="text" class="form-control" id="exampleInputName1" name="magrib" value="{{ $prayer->magrib }}" placeholder="magrib">
            @error('magrib')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Esha</label>
            <input type="text" class="form-control" id="exampleInputName1" name="esha" value="{{ $prayer->esha }}" placeholder="esha">
            @error('esha')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
          <a href="{{ route('admin.settings.prayer') }}" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
