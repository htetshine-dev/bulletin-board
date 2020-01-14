@extends('layouts.master')

@section('title','Change Password')

@section('content')
  <div class="container marginbottom-60">
    <div class="row">
      <div class="col-md-6 offset-3 card bg-light margintop-100">
        <div class="card-header"><h5>Change Password</h5></div>
        <div class=" card-body">
        <form method="post">
          @csrf
          <div class="form-group">
            <label for="oldpassword">Old Password</label>
            <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" id="oldpassword">
          </div>
          <div class="form-group">
            <label for="newpassword">New Password:</label>
            <input type="password" class="form-control" placeholder="New password" name="newpassword" id="newpassword">
          </div>
          <div class="form-group">
            <label for="confirm-new-password">Confirm New Password:</label>
            <input type="password" class="form-control" placeholder="Confirm New password" name="confirm-new-password" id="confirm-new-password">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-check">
                
              </div>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  
  @endsection