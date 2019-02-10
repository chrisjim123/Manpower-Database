@extends('layouts.guest')


@section('contentheader')


  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Project Info
            <small>Preview</small>
          </h1>


       <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Personal Info</li>
          </ol>


   
        </section>

@endsection


@section('content')



        
<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>
 
 
   
    <div class="row">
        <div class="col-sm-10"><h1>{{$person->firstname}} {{$person->lastname}}</h1></div>
<!-- <div class="col-sm-2"><a href="{{ url('/home')}}"  class="pull-right"><button class="btn btn-md btn-success"><i class="glyphicon glyphicon-home"  {{ (current_page("home")) ? 'class=active' : '' }}></i> Home</button></a></div>
 -->
    <!--     <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" style="size:100px;" src="http://www.gravatar.com/avata?s=100"></a></div>
 -->    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
      <img src="data:image;base64,{{$person->imagefile}}" class="avatar img-circle img-thumbnail" alt="avatar">
   <!--      <img src="/defaultimage.png" class="avatar img-circle img-thumbnail" alt="avatar"> -->
<!--         <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload"> -->
      </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body">None</div>
          </div>
          
          
<!--           <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul>  -->
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
                <i class="fa fa-facebook fa-2x">Facebook</i><br><i class="fa fa-github fa-2x">Instagram</i><br><i class="fa fa-twitter fa-2x">Twitter</i><i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
        <div class="col-sm-9">
             <ul class="nav nav-tabs">

                <li {{ (current_page("personalinfo")) ? 'class=active' : '' }}><a href="{{ url('/personalinfo')}}/{{$person->id}}">Basic Info</a></li>
               
                <li {{ (current_page("educationinfo")) ? 'class=active' : '' }}><a href="{{ url('/educationinfo')}}/{{$person->id}}">Educational Info</a></li>
              
                <li {{ (current_page("governinfo")) ? 'class=active' : '' }}><a href="{{ url('/governinfo')}}/{{$person->id}}">Government Info</a></li>
 
                <li {{ (current_page("companyinfo")) ? 'class=active' : '' }}><a href="{{ url('/companyinfo')}}/{{$person->id}}">Company Info</a></li>

                <li {{ (current_page("projectinfo")) ? 'class=active' : '' }}><a href="{{ url('/projectinfo')}}/{{$person->id}}">Projects Info</a></li>

                <li {{ (current_page("Others")) ? 'class=active' : '' }}><a href="{{ url('/Others')}}/{{$person->id}}">Others</a></li>

              </ul>

                  <hr>
 


<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Project List</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Nos.</th>
                      <th>Status</th>
                      <th>Project Name</th>
                      <th>Training Date</th>
                      <th>Break Date</th>
                      <th>Project Duration</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td><span class="label label-primary">Ongoing</span></td>
                      <td>Nescafe BA On Aisle 2019</td>
                      <td>12-27-2019</td>
                      <td>01-23-2019</td>
                      <!-- <td><span class="label label-success">Approved</span></td> -->
                      <td>January-June 2019</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><span class="label label-primary">Ongoing</span></td>
                      <td>Nescafe Classic Strong 2019</td>
                      <td>12-27-2019</td>
                      <td>01-23-2019</td>
                      <!-- <td><span class="label label-success">Approved</span></td> -->
                      <td>January-June 2019</td>

                    </tr>
                    <tr>
                      <td>3</td>
                      <td><span class="label label-primary">Ongoing</span></td>
                      <td>Barangay Swap Sarap 2019</td>
                      <td>12-27-2019</td>
                      <td>01-23-2019</td>
                      <!-- <td><span class="label label-success">Approved</span></td> -->
                      <td>January-June 2019</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><span class="label label-primary">Ongoing</span></td>
                      <td>Nescafe Suki Seller 2019</td>
                      <td>12-27-2019</td>
                      <td>01-23-2019</td>
                      <td>January-June 2019</td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>









<!--  -->

<!-- 
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div> -->
       



              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      

@endsection




