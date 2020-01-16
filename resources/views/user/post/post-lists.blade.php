@extends('layouts.master')

@section('title','Post Lists')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10 marginbottom-60">
      <div class="card-header"><h5>Post Lists</h5></div>
        <div class=" card-body">
          <div class="row margintop-10">
            <div class="col-md-3">
            <form method="post" action="{{ url('/user/post/search') }}">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">Go</button>
                </div>
              </div>
            </form>
            </div>
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-4">
                  <a href="/user/post/create-post" class="href">
                    <button type="button" class="btn btn-primary float-right">Add</button>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="/user/csv/upload-csv" class="href">
                    <button type="button" class="btn btn-primary float-right">Upload</button>
                  </a>
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary float-right">Download</button>
                </div>
              </div>
            </div>
          </div>
          <hr/>
          @if(session('status'))
            <div class="alert alert-success">
            <strong>{{ session('status') }}</strong>
            </div>
          @endif
          
          <table class="table table-light table-striped">
            <thead>
              <tr>
                <th>Post Title</th>
                <th>Post Description</th>
                <th>Posted User</th>
                <th>Posted Date</th>
                <th></th><th></th>
              </tr>
           </thead>
           <tbody>
            @foreach($posts as $post)
              <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
              <td>@if($post->created_user_id==1) Admin @endif</td>
                <td>{{ $post->created_at }}</td>
              <td><a href="{{ __('/user/post/update-post/') }}{{ $post->id }}">Edit</a></td>
              <td><a href="#" data-toggle="modal" data-target="#confirmDeletePost">Delete</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <ul class="pagination  justify-content-center">
            {{ $posts->links() }}
          </ul>
        </div>
  </div>
</div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="confirmDeletePost" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
        Are you sure you want to delete?
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="{{ __('/user/post/delete-post/') }}{{ $post->id }}"><button type="button" class="btn btn-primary">Ok</button></a>
      </div>
    </div>
  </div>
</div>