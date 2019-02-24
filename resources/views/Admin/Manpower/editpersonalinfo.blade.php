@extends('layouts.app')

@section('content')
<!--       <div class="card-header"><a href="home">Dashboard</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            </div> -->
        
<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>


 
<div class="container bootstrap snippet">

 
    <div class="row">
        <div class="col-sm-10"><h1>{{$person->firstname}} {{$person->lastname}}</h1></div>
<div class="col-sm-2"><a href="{{ url('/home')}}"  class="pull-right"><button class="btn btn-md btn-success"><i class="glyphicon glyphicon-home"  {{ (current_page("home")) ? 'class=active' : '' }}></i> Home</button></a></div>

    <!--     <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" style="size:100px;" src="http://www.gravatar.com/avata?s=100"></a></div>
 -->    </div>


    <form class="form" action="{{ url('/updateprofilepicture')}}/{{$person->id}}" method="post" id="registrationForm" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">




    <div class="row">
        <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
      <img title="Profile Picture" src="data:image;base64,{{$person->imagefile}}" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" name="image" required><br>
        <button class="btn btn-sm btn-success"><i class="glyphicon glyphicon-save"></i> Update Profile Picture</button>
      </div></hr><br><br>
    
               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
    
</form>



 

          
  <!--         <ul class="list-group">
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

                <li {{ (current_page("editpersonalinfo")) ? 'class=active' : '' }}><a href="{{ url('/editpersonalinfo')}}/{{$person->id}}">Basic Info</a></li>
               
                <li {{ (current_page("educationinfo")) ? 'class=active' : '' }}><a href="{{ url('/educationinfo')}}/{{$person->id}}">Educational Info</a></li>
              
                <li {{ (current_page("governinfo")) ? 'class=active' : '' }}><a href="{{ url('/governinfo')}}/{{$person->id}}">Government Info</a></li>
               
                <li {{ (current_page("companyinfo")) ? 'class=active' : '' }}><a href="{{ url('/companyinfo')}}/{{$person->id}}">Company Info</a></li>

                <li {{ (current_page("projectinfo")) ? 'class=active' : '' }}><a href="{{ url('/projectinfo')}}/{{$person->id}}">Projects Info</a></li>

                <li {{ (current_page("Others")) ? 'class=active' : '' }}><a href="{{ url('/Others')}}/{{$person->id}}">Others</a></li>
 
              </ul>

              
                <hr>


    <form class="form" action="{{ url('/updatepersonalinfo')}}/{{$person->id}}" method="post" id="registrationForm" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

   
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input value="{{$person->firstname}}" type="text" class="form-control" name="first_name" id="upr" placeholder="first name">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input value="{{$person->lastname}}" type="text" class="form-control" name="last_name" id="upr" placeholder="last name">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="gender"><h4>Gender</h4></label>
                              <input value="{{$person->gender}}" type="text" class="form-control" name="gender" id="upr" placeholder="enter gender">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="birthdate"><h4>Birth Date</h4></label>
                              <input value="{{$person->birthdate}}" type="date" class="form-control" name="birthdate" id="upr" placeholder="enter birth date">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="placeofbirth"><h4>Place of Birth</h4></label>
                              <input  value="{{$person->placeofbirth}}" type="text" class="form-control" name="placeofbirth" id="upr" placeholder="enter place of birth">
                              </div>
                      </div>
                  <div class="form-group">
                         
                      <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input value="None" type="text" class="form-control" name="phone" id="upr" placeholder="enter phone">
                          </div>
                      </div>
          
                        <div class="form-group">
                           <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input value="{{$person->phone}}" type="text" class="form-control" name="mobile" id="upr" placeholder="enter mobile number">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input value="{{$person->email}}" type="email" class="form-control" name="email" id="upr" placeholder="you@email.com">
                          </div>
                      </div>


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input value="{{$person->location}}" type="text" class="form-control" id="upr" placeholder="somewhere">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-6">
                              <label for="password"><h4>Religion</h4></label>
                              <input value="Roman Catholic" type="text" class="form-control" name="Roman Catholic" id="upr" placeholder="password">
                          </div>
                      </div>
                      <div class="form-group">
                         <div class="col-xs-6">
                            <label for="password2"><h4>Civil Status</h4></label>
                              <input value="Single" type="text" class="form-control" name="Single" id="upr" placeholder="password2">
                          </div>
                      </div>
            
                   

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-save"></i> Save</button>
<!--                                 <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
 -->                            </div>
                      </div>
            
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      
    </form>

 
@endsection






<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>

