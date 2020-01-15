@extends('layouts.master')

@section('title','Login Page Design')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-3 card bg-light margintop-100">
      <div class="card-header"><h5>Login Form</h5></div>
      <div class=" card-body">
      <form method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="remember" type="checkbox"> Remember me
              </label>
            </div>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </div>
        <a href="#">forgot password ?</a>
      </form>
    </div>
  </div>
</div>
 
 @endsection