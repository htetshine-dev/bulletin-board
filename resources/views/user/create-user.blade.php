@extends('layouts.master')

@section('title','Create User')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2 card bg-light margintop-10">
      <div class="card-header"><h5>Create User</h5></div>
      <form method="post">
        @csrf
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
              <label for="password">Password</label>
            </div>
            <div class="col-md-8">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus>
            </div>
            <div calss="col-md-1">
                <span class="text-danger">*</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="password_confirmation">Confirm Password</label>
            </div>
            <div class="col-md-8">
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autofocus>
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
          <div class="row">
            <div class="col-md-3 margintop-10">
              <label for="profile">Profile</label>
            </div>
            <div class="col-md-8">
              <div id="msg"></div>                      
                <input type="file" name="img[]" class="file" accept="image/*">
                  <div class="input-group my-3">
                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                      <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Browse...</button>
                          <script>
                            $(document).on("click", ".browse", function() {
                              var file = $(this).parents().find(".file");
                              file.trigger("click");
                            });
                            $('input[type="file"]').change(function(e) {
                              var fileName = e.target.files[0].name;
                              $("#file").val(fileName);

                              var reader = new FileReader();
                              reader.onload = function(e) {
                                // get loaded data and render thumbnail.
                                document.getElementById("preview").src = e.target.result;
                              };
                              // read the image file as a data URL.
                              reader.readAsDataURL(this.files[0]);
                            });
                          </script>
                      </div>
                      <div class="input-group-append">
                        <span class="text-danger">*</span>
                      </div>
                    </div>  
                  </div>
                  <div class="col-md-8 offset-3">
                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                  </div>
                <div> 
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
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#confirmCreateUser" >Confirm</button>
                </div>
                <div class="col-md-6">
                  <button onclick="reset()" class="btn btn-primary float-right">Clear</button>
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

<!-- The Modal -->
<div class="modal fade" id="confirmCreateUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Create User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="/user/create-user">
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
                <input type="name" class="form-control @error('comment') is-invalid @enderror"  id="name" name="name" required autocomplete="email" autofocus disabled>
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
                  <label for="password">Password</label>
                </div>
                <div class="col-md-8">
                <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password" required autocomplete="password" autofocus disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="password_confirmation">Confirm Password</label>
                </div>
                <div class="col-md-8">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  id="password_confirmation" name="password_confirmation" required autocomplete="password_confirmation" autofocus disabled>
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
                <textarea class="form-control @error('comment') is-invalid @enderror" rows="5" id="address" name="address" required autocomplete="address" autofocus disabled></textarea>
                </div>
                <div calss="col-md-1">
                </div>
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
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6">
            <button type="submmit" class="btn btn-primary float-right" >Create</button>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
  @endsection