@extends('layouts.master')

@section('title', 'Upload Csv')

@section('content')
<div class="container marginbottom-180">
  <div class="row">
      <div class="col-md-6 offset-3 card bg-light margintop-100">
        <div class="card-header"><h5>Upload Csv</h5></div>
          <div class=" card-body">
            <form method="post">
            @csrf
              <div class="custom-file margintop-50">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <script>
                $(".custom-file-input").on("change", function() {
                  var fileName = $(this).val().split("\\").pop();
                  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
              </script>
              <div class="row margintop-50">
                <div class="col-md-6">
                  <div class="form-group form-check"></div>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary float-right">Import File</button>
                </div>
            </form>            
          </div>    
        </div>    
      </div>
   </div>
</div>
</div>
  @endsection  
