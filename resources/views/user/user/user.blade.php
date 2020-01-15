@extends('layouts.master')

@section('title','User Profile')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2 card bg-light margintop-10">
      <div class="card-header"><h5>User Profile</h5></div>
      <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <div class="row margintop-10">
                <div class="col-md-3">
                  <label for="name">Name</label>
                </div>
                <div class="col-md-8">
                  <input type="name" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" required autocomplete="name" autofocus disabled>
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
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autocomplete="email" autofocus disabled>
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
                  <select class="form-control" id="type" name="type" disabled>
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
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus disabled>
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
                  <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror"id="dateofbirth" name="dateofbirth" required autofocus disabled>
                </div>
                <div calss="col-md-1"> </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="address">Address</label>
                </div>
                <div class="col-md-8">
                  <textarea class="form-control @error('address') is-invalid @enderror" rows="5" id="address" name="address" required autofocus disabled></textarea>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>              
            <div class="row marginbottom-15">
              <div class="col-md-8"></div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <a href="{{ __('/user/user/update-user/1') }}"><button class="btn btn-primary float-right">Edit</button></a>
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
    </div>
  </div>
</div>
</div>
 @endsection