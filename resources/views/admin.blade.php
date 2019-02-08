@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="glyphicon glyphicon-home"> Home</i></div>

 

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>

  <div class="container">


  </div>

            </div>
          </div> 
        </div> 
    </div>
</div>
@endsection






    