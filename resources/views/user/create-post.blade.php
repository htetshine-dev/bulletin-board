@extends('layouts.master')

@section('title','Create Post')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10">
      <div class="card-header"><h5>Create Post</h5></div>
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
        <div class="marginbottom-15">
          <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-2">
              <div class="row">
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#confirmCreatePost">Confirm</button>
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
<div class="modal fade" id="confirmCreatePost">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Create Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form method="post">
        @csrf
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="title">Title:</label>
                <div class="row">
                  <div class="col-md-12">
                    <input type="name" class="form-control @error('title') is-invalid @enderror"  id="name" name="title" required autocomplete="title" disabled>
                  </div>
                </div>
             </div>
             <div class="form-group">
                <label for="comment">Comment:</label>
                <div class="row">
                  <div class="col-md-12">
                    <textarea class="form-control @error('comment') is-invalid @enderror"  rows="13" id="comment" name="comment" required autocomplete="comment" disabled></textarea>
                  </div>
                </div>   
              </div>
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary float-right">Create</button>
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