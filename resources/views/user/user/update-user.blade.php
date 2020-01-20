@extends('layouts.master')

@section('title','Update User')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2 card bg-light margintop-10 marginbottom-60">
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
              <div calss="col-md-1"></div>
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
              <a href="/user/user/change-password/1">Change Password</a>
            </div>            
            <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#confirmUpdateUser" >Confirm</button>
                  </div>
                  <div class="col-md-6">
                    <button onclick="reset()" class="btn btn-primary float-right">Clear</button>
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

<div class="modal fade" id="confirmUpdateUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Update User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post">
      @csrf
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <div class="row margintop-10">
                <div class="col-md-3">
                  <label for="name">Name</label>
                </div>
                <div class="col-md-8">
                  <input type="name" class="form-control @error('comment') is-invalid @enderror"  id="name" name="name" required autocomplete="name" autofocus disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="email">Email Address</label>
                </div>
                <div class="col-md-8">
                  <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" required autocomplete="email" autofocus disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>           
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="type">Type</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control"  id="type" name="type" disabled>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                  <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="phone">Phone</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="phone" name="phone" required autocomplete="phone" autofocus disabled>
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
                  <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror"  id="dateofbirth" name="dateofbirth" required autocomplete="dateofbirth" autofocus disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="address">Address</label>
                </div>
                <div class="col-md-8">
                  <textarea class="form-control @error('comment') is-invalid @enderror" rows="5" id="address" name="address" required autocomplete="address" autofocus disabled></textarea>
                </div>
                <div calss="col-md-1"></div>
              </div>
               </div>
            </div>
            <div class="col-md-3">
              <div class="form-group margintop-10">
                <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail float-right mr-5">
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer marginbottom-60">
          <div class="row">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary float-right" >Create</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
 @endsection