@extends('layouts.master')


@section('contentheader')


  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manpower
            <small>Home</small>
          </h1>


       <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Manpower</li>
          </ol>


   
        </section>

@endsection

    

@section('content')
 

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>




                    <form action="{{ URL::to('/search') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
          
                        <div class="col-xs-12">
                       <div class="input-group">
                        <input class="form-control" name="search" placeholder="Search here (First Name, Middle Name or Last Name)" type="text"><span class="input-group-btn"><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
                        </div>
                        </div>
                    </form>


<br>
<hr>

              

@if(isset($data))
@foreach($data as $per)


             <div class="col-md-12">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-orange-active">
<!--                     <div class="widget-user-header bg-black" style="background: url('../../asilogonew.png') center center;">
 -->                  <h3 class="widget-user-username">{{$per->firstname}} {{$per->lastname}}</h3>
                  <h5 class="widget-user-desc">{{$per->position}}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="data:image;base64,{{$per->imagefile}}" alt="User Avatar">
                </div>
                <div class="box-footer bg-gray-active">
                  <div class="row">
                    <div class="col-sm-12 border-center">
                      <div class="description-block">
                        <a href="adminpersonalinfo/{{$per->id}}"><button class="btn btn-sm btn-success"><i class="glyphicon glyphicon-search"  {{ (current_page("home")) ? 'class=active' : '' }}></i> View</button></a>
                        <span class="description-text"> </span>
                      </div> 
                    </div> 


<!--                     <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      <button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"  {{ (current_page("home")) ? 'class=active' : '' }}></i> Edit</button>
                      </div>
                    </div>



                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                      <button class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"  {{ (current_page("home")) ? 'class=active' : '' }}></i> More</button>
                      </div> 
                    </div>  -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
         

<!-- 

<div class="container">
  <div class="row">
        <div class="profile-header-container">   
        <div class="profile-header-img">
                <a href="personalinfo/{{$per->id}}"><img class="img-circle" src="data:image;base64,{{$per->imagefile}}" /></a>
              
                <div class="rank-label-container">
                    <span class="label label-default rank-label">100 puntos</span>
                </div>
            </div>
        </div> 
  </div>
</div> -->


                    @endforeach
                           
                    
                    {{$data->links()}}
                    @else
                    {{ $message }}
                    @endif



 
@endsection












