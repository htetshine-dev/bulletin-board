@extends('layouts.master')

@section('title','Post Lists')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10">
      <div class="card-header"><h5>Post Lists</h5>
        <div class="row margintop-10">
          <div class="col-md-3">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Go</button>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-4">
                <a href="/user/create-post" class="href">
                  <button type="button" class="btn btn-primary float-right">Add</button>
                </a>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary float-right">Upload</button>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary float-right">Download</button>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class=" card-body">
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
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>John</td>
                <td><a href="{{ __('/user/update-post/1') }}">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
                <td>John</td>
                <td><a href="{{ __('/user/update-post/1') }}">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>John</td>
                <td><a href="{{ __('/user/update-post/1') }}">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>John</td>
                <td><a href="{{ __('/user/update-post/1') }}">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>John</td>
                <td><a href="{{ __('/user/update-post/1') }}">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>John</td>
                <td><a href="{{ __('/user/update-post/1') }}">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
            </tbody>
          </table>
            <ul class="pagination pagination-sm justify-content-center">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
    </div>
  </div>
</div>
</div>
@endsection