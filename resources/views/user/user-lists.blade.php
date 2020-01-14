@extends('layouts.master')

@section('title','User Lists')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10">
      <div class="card-header"><h5>User Lists</h5></div>
        <div class="card-body">
            <div class="row margintop-10">
              <div class="col-md-2">
                <input type="text" name="name" id="name" placeholder="Name" class="form-control"/>
              </div>
              <div class="col-md-2">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control"/>
              </div>
              <div class="col-md-2">
                <input type="text" name="createdfrom" id="createdfrom" placeholder="Created From" class="form-control"/>
              </div>
              <div class="col-md-2">
                <input type="text" name="createdto" id="createdto" placeholder="Created To" class="form-control"/>
              </div>
              <div class="col-md-2">
                <button type="submmit" class="btn btn-primary">Search</button>
              </div>
              <div class="col-md-2">
                <a href="{{ __('/user/create-user') }}"><button class="btn btn-primary">Add</button></a>
              </div>
            </div>
            <hr/>
          <table class="table table-light table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created User</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="{{ __('/user/profile/1') }}">Htet</a></td>
                <td>htet@example.com</td>
                <td>Admin</td>
                <td>09795101933</td>
                <td>03/07/1993</td>
                <td>01/14/2020</td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td><a href="{{ __('/user/profile/1') }}">Htet</a></td>
                <td>htet@example.com</td>
                <td>Admin</td>
                <td>09795101933</td>
                <td>03/07/1993</td>
                <td>01/14/2020</td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td><a href="{{ __('/user/profile/1') }}">Htet</a></td>
                <td>htet@example.com</td>
                <td>Admin</td>
                <td>09795101933</td>
                <td>03/07/1993</td>
                <td>01/14/2020</td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td><a href="{{ __('/user/profile/1') }}">Htet</a></td>
                <td>htet@example.com</td>
                <td>Admin</td>
                <td>09795101933</td>
                <td>03/07/1993</td>
                <td>01/14/2020</td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <td><a href="{{ __('/user/profile/1') }}">Htet</a></td>
                <td>htet@example.com</td>
                <td>Admin</td>
                <td>09795101933</td>
                <td>03/07/1993</td>
                <td>01/14/2020</td>
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