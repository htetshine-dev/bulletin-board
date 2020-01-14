@extends('layouts.master')

@section('title','Update User')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2 card bg-light margintop-10">
      <div class="card-header"><h5>Update User</h5></div>
      <form method="post">
        @csrf
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
                <div class="row margintop-10">
                  <div class="col-md-3">
                    <label for="name">Name</label>
                  </div>
                  <div class="col-md-8">
                    <input type="name" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" required autocomplete="name" autofocus>
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
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autocomplete="email" autofocus>
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
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus>
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
                    <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror"id="dateofbirth" name="dateofbirth" required autofocus>
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
                    <textarea class="form-control @error('address') is-invalid @enderror" rows="5" id="address" name="address" required autofocus></textarea>
                  </div>
                  <div calss="col-md-1">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <a href="">Change Password</a>
              </div>
              
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-3">
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
          </div>
          <div class="col-md-3">
            <div class="form-group margintop-10">
              <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail float-right mr-5">
            </div>
          </div>
        </div>
        
      </form>
    </div>
  </div>
</div>
</div>
  @endsection