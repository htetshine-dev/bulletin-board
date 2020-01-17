@extends('layouts.master')
@section('title','Post Lists')
@section('content')
{{-- Main Content --}}
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10 marginbottom-60">
      {{-- Title --}}
      <div class="card-header"><h5>Post Lists</h5></div>
      <div class="card-body">
        <div class="row margintop-10">
          <div class="col-md-3">
            {{-- Form For Search Box --}}
            <form method="post" action="{{ url('/user/post/search') }}">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="title" id="title" 
                placeholder="Search">
                <div class="input-group-append">
                  {{-- Search Button --}}
                  <button type="submit" class="btn btn-primary">Go</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-4">
                {{-- Link For Add --}}
                <a href="/user/post/create-post" class="href">
                  <button type="button" class="btn btn-primary float-right">
                  Add</button>
                </a>
              </div>
              <div class="col-md-4">
                {{-- Link For Upload --}}
                <a href="/user/csv/upload-csv" class="href">
                  <button type="button" class="btn btn-primary float-right">
                  Upload</button>
                </a>
              </div>
              <div class="col-md-4">
                <a href="#" class="href">
                  <button type="button" class="btn btn-primary float-right">
                  Download</button> 
                </a>
              </div>
            </div>
          </div>
        </div>
        <hr/>
        {{-- Success Message For Delete --}}
        @if(session('status'))
          <div class="alert alert-success">
            <strong>{{ session('status') }}</strong>
          </div>
        @endif 
        <table class="table table-hover" id="htmltable">
          {{-- Table Header --}}
          <thead>
            <tr>
              <th>Post Title</th>
              <th>Post Description</th>
              <th>Posted User</th>
              <th>Posted Date</th>
              <th></th><th></th>
            </tr>
          </thead>
          {{-- Table Body --}}
          <tbody>
            {{-- if the number of post is not null --}}
            @if(count($posts)!='')
              {{-- looped for each posts data as post data --}}
              @foreach($posts as $post)
                <tr>
                  {{-- Column for Title --}}
                  <td>
                    {{-- Link For View Modal Box --}}
                    {{-- <form method="post" action="" id="view"> --}}
                    <a href="#" data-toggle="modal" data-target="#viewModal">
                    {{ $post->title }}</a>
                    {{-- </form> --}}
                  </td>
                  {{-- Column for Comment --}}
                  <td>{{ $post->description }}</td>
                  {{-- Column for Posted User --}}
                  <td>@if($post->created_user_id==1) Admin @endif</td>
                  {{-- Column for Posted Date --}}
                  <td>{{ $post->created_at }}</td>
                  {{-- Column for Edit Post --}}
                  <td><a href="{{ __('/user/post/update-post/') }}{{ $post->id }}">
                  Edit</a></td>
                  {{-- Column for Delete Post --}}
                  <td>
                    <form mehtod="post" action="{{ __('/user/post/delete-post/') }}
                    {{ $post->id }}" id="confirm">
                      {{-- <a href="#" data-toggle="modal" 
                      data-target="#confirmDeletePost">Delete</a></td> --}}
                      <button type="button" class="btn btn-primary float-right" 
                      data-toggle="modal" data-target="#confirmDeletePost">
                      Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            {{-- if the number of post is null --}}  
            @else
              <tr>
                <td class="text-center" colspan="6"> There is no posts</td>
              </tr>
            @endif  
          </tbody>
        </table>
          {{-- Pagination for list and search of posts --}}
          <ul class="pagination  justify-content-center">
            {{ $posts->links() }}
          </ul>
        </div>
    </div>
  </div>
</div>
<!-- Delete Confirm Modal -->
<div class="modal fade" id="confirmDeletePost" tabindex="-1" role="dialog"
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- Modal Header --}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- Modal Body --}}
      <div class="modal-body">
        <center>
          Are you sure you want to delete?
        </center>
      </div>
      {{-- Modal Footer --}}
        <div class="modal-footer">
          {{-- Button for Cancel --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cancel</button>
          {{-- Button for Confirm --}}
          <button type="submit" form="confirm" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Post View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- Modal Header --}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- Modal Body --}}
      <div class="modal-body">  
        .....
      </div>
      {{-- Modal Footer --}}
      <div class="modal-footer">
        {{-- Button for Close --}}
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

