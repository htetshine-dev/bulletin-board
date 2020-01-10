@extends('layouts.master')

@section('title','Create Post')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-100">
      <div class="card-header"><h5>Create Post</h5></div>
      <form action="/action_page.php">
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="name" class="form-control" placeholder="Enter Title" id="name">
       </div>
       <div class="form-group">
          <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>
        <div class="marginbottom-15">
          <div class="row">
          <button type="submit" class="btn btn-primary">Confirm</button>
          <button type="submit" class="btn btn-primary">Clear</button>
        </div>
      </form>
    </div>
  </div>
</div>
  @endsection