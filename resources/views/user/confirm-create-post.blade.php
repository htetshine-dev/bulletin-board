@extends('layouts.master')

@section('title','Confirm Create Post')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-100">
      <div class="card-header"><h5>Confirm Create Post</h5></div>
      <form method="post">
      @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <div class="row">
            <div class="col-md-12">
              <input type="name" class="form-control @error('title') is-invalid @enderror" value="{{ $title }}" id="name" name="title" required autocomplete="title" disabled>
            </div>
          </div>
       </div>
       <div class="form-group">
          <label for="comment">Comment:</label>
          <div class="row">
            <div class="col-md-12">
              <textarea class="form-control @error('comment') is-invalid @enderror"  rows="5" id="comment" name="comment" required autocomplete="comment" disabled>{{ $comment }}</textarea>
            </div>
          </div>   
        </div>
        <div class="marginbottom-15">
          <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
              <div class="row">
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-primary float-right">Cancle</button>
                </div>
              </div>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
  @endsection

  