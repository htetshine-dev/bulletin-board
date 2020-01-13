@extends('layouts.master')

@section('title','Create Post')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2 card bg-light margintop-100">
      <div class="card-header"><h5>Create User</h5></div>
      <form method="post">
      @csrf
      <div class="form-group">
        <div class="row margintop-10">
          <div class="col-md-3">
            <label for="name">Name</label>
          </div>
          <div class="col-md-8">
              <input type="name" class="form-control @error('comment') is-invalid @enderror"  id="name" name="name" required autocomplete="email" autofocus>
          </div>
          <div calss="col-md-1">
              <span class="text-danger">*</span>
          </div>
        </div>
      </div>
       <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="email">Email Address</label>
            </div>
            <div class="col-md-8">
                <input type="email" class="form-control @error('comment') is-invalid @enderror" id="email" name="email" required autocomplete="email" autofocus>
            </div>
            <div calss="col-md-1">
                <span class="text-danger">*</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="password">Password</label>
            </div>
            <div class="col-md-8">
                <input type="password" class="form-control @error('comment') is-invalid @enderror" id="password" name="password" required autocomplete="password" autofocus>
            </div>
            <div calss="col-md-1">
                <span class="text-danger">*</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="confirmpassword">Confirm Password</label>
            </div>
            <div class="col-md-8">
              <input type="password" class="form-control @error('comment') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autocomplete="password_confirmation" autofocus>
            </div>
            <div calss="col-md-1">
              <span class="text-danger">*</span>
            </div>
            </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="confirmpassword">Type</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="type" name="type">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
            <div calss="col-md-1">
              <span class="text-danger">*</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="phone">Phone</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control @error('comment') is-invalid @enderror" id="phone" name="phone" required autocomplete="password_confirmation" autofocus>
            </div>
            <div calss="col-md-1"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="dateofbirth">Date Of Birth</label>
            </div>
            <div class="col-md-8">
              <input type="date" class="form-control @error('comment') is-invalid @enderror"id="dateofbirth" name="dateofbirth" required autocomplete="dateofbirth" autofocus>
            </div>
            <div calss="col-md-1">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="address">Address</label>
            </div>
            <div class="col-md-8">
              <textarea class="form-control @error('comment') is-invalid @enderror" rows="5" id="address" name="address" required autocomplete="dateofbirth" autofocus></textarea>
            </div>
            <div calss="col-md-1">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-3 margintop-10">
              <label for="profile">Profile</label>
            </div>
            <div class="col-md-8">
                <div class="ml-2 col-md-8">
                    <div id="msg"></div>
                    <form method="post" id="image-form">
                      <input type="file" name="img[]" class="file" accept="image/*">
                      <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                        <div class="input-group-append">
                          <button type="button" class="browse btn btn-primary">Browse...</button>
                        </div>
                        <div class="input-group-append">
                          <span class="text-danger">*</span>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="ml-2 col-md-8">
                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                  </div>
            </div>
            <div calss="col-md-1"></div>
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
  @endsection