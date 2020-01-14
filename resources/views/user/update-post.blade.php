@extends('layouts.master')

@section('title','Update Post')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10">
      <div class="card-header"><h5>Update Post</h5></div>
      <form method="post">
      @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <div class="row">
            <div class="col-md-11">
              <input type="name" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Title" id="name" name="title" required autocomplete="title" autofocus>
            </div>
            <div class="col-md-1">
              <span class="text-danger">*</span>
            </div>
          </div>
       </div>
       <div class="form-group">
          <label for="comment">Comment:</label>
          <div class="row">
            <div class="col-md-11">
              <textarea class="form-control @error('comment') is-invalid @enderror" rows="13" id="comment" name="comment" required autocomplete="comment" autofocus>{{ old('comment') }}</textarea>
            </div>
            <div class="col-md-1">
            <span class="text-danger">*</span>
            </div>
          </div>   
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
             Status:
            </div>
            <div class="col-md-10">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="status">
                <span class="custom-control-indicator"></span>
              </label>
            </div>
          </div>
        </div>
        <div class="marginbottom-15">
          <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-2">
              <div class="row">
                <div class="col-md-6">
                  <button onclick="confirm(0)" class="btn btn-primary float-right" >Confirm</button>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary float-right">Clear</button>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
  @endsection