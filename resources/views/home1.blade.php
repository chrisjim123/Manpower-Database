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
 
<center><h2>Welcome Guest!</h2></center>
<br>
 
                    <form action="{{ URL::to('/search') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
          
                       <div class="input-group">
                        <input class="form-control" name="search" placeholder="Search here (First Name, Middle Name or Last Name)" type="text"><span class="input-group-btn"><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
                        </div>
                    </form>
              
 
  
<br>
  <div class="container">








@if(isset($data))
@foreach($data as $per)




<div class="container">
  <div class="row">
        <div class="profile-header-container">   
        <div class="profile-header-img">
                <a href="personalinfo/{{$per->id}}"><img class="img-circle" src="data:image;base64,{{$per->imagefile}}" /></a>
                <!-- badge -->
                <div class="rank-label-container">
                    <span class="label label-default rank-label">100 puntos</span>
                </div>
            </div>
        </div> 
  </div>
</div>


     @endforeach
                           
                    
                    {{$data->links()}}
                    @else
                    {{ $message }}
                    @endif
                </div>
            </div>
               </div> 
        </div>
    
    </div>
</div>
@endsection



<script type="text/javascript">
  
  body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}  
    .profile-header-container{
    margin: 0 auto;
    text-align: center;
}

.profile-header-img {
    padding: 54px;
}

.profile-header-img > img.img-circle {
    width: 120px;
    height: 120px;
    border: 2px solid #51D2B7;
}

.profile-header {
    margin-top: 43px;
}
</script>





    