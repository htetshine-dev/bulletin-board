@extends('layouts.master')
@section('title','Create Post')
@section('content')
{{-- Main Content --}}
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10 marginbottom-60">
      {{-- Form Title --}}
      <div class="card-header"><h5>Create Post</h5></div>
      {{-- Form Body --}}
      <form method="post" id="confirm">
        @csrf
        {{-- Success Message For Create Post --}}
        @if(session('status'))
          <div class="alert alert-success">
            <strong>{{ session('status') }}</strong>
          </div>
        @endif
        {{-- Label, Input and Required for Title of Form --}}
        <div class="form-group">
          <label for="title">Title:</label>
          <div class="row">
            <div class="col-md-11">
              <input type="text" class="form-control" placeholder="Enter Title"
              id="title" name="title" required autocomplete="title" autofocus>
              {{--  Error Message For Title --}}
              @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-1">
              <span class="text-danger">*</span>
            </div>
          </div>
        </div>
        {{-- Label, Input and Required for Comment of Form --}}
        <div class="form-group">
          <label for="comment">Comment:</label>
          <div class="row">
            <div class="col-md-11">
              <textarea class="form-control" placeholder="Enter Comment" rows="13"
              id="comment" name="comment" required autocomplete="comment" 
              autofocus></textarea>
              {{-- Error Message For Comment --}}
              @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-1">
              <span class="text-danger">*</span>
            </div>
          </div>   
        </div>
        {{-- Form Footer --}}
        <div class="row marginbottom-15">
          <div class="col-md-2 offset-md-9">
            <div class="row">
              <div class="col-md-6">
                {{-- Button for Create Post Confirm Modal --}}
                <button type="button" class="btn btn-primary float-right"
                data-toggle="modal" data-target="#confirmCreatePost">Confirm
                </button>
              </div>
              <div class="col-md-6">
                {{-- Button for Clear  --}}
                <button type="button" onclick="reset()" class="btn btn-primary
                float-right">Clear</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- Create Post Confirm Modal --}}
<div class="modal" id="confirmCreatePost">
  <div class="modal-dialog">
    <div class="modal-content">
       {{-- Modal Header  --}}
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post">
        @csrf
        {{-- Modal body  --}}
        <div class="modal-body"> 
          {{-- Post Title --}}
          <div class="form-group">
            <label for="title">Title:</label>
            <div class="row">
              <div class="col-md-12">
                <input type="text" class="form-control" id="title" name="title" 
                required disabled>
              </div>
            </div>
          </div>
          {{-- Post Comment --}}
          <div class="form-group">
            <label for="comment">Comment:</label>
            <div class="row">
              <div class="col-md-12">
                <textarea class="form-control" rows="13" id="comment" name="comment"
                required disabled></textarea>
              </div>
            </div>   
          </div>        
        </div>
        {{-- Modal footer  --}}
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-6">
              {{-- Button for Create --}}
              <button type="submit" form="confirm" class="btn btn-primary 
              float-right">Create</button>
            </div>
            <div class="col-md-6">
              {{-- Button for Close --}}
              <button type="button" class="btn btn-danger float-right" 
              data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
 

