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


 
<div class="container bootstrap snippet">

 
    <div class="row">
        <div class="col-sm-10"><h1>{{$person->firstname}} {{$person->lastname}}</h1></div>
    <!--     <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" style="size:100px;" src="http://www.gravatar.com/avata?s=100"></a></div>
 -->    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="/defaultimage.png" class="avatar img-circle img-thumbnail" alt="avatar">
<!--         <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload"> -->
      </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
          
          
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
                <li id="basicinfo"><a href="personalinfo/{{$person->id}}">Basic Info</a></li>
                <li><a href="educationinfo/{{$person->id}}">Educational Info</a></li>
                <li><a href="governinfo/{{$person->id}}">Government Info</a></li>
<!--                 <li><a href="companyinfo/{{$person->id}}">Company Info</a></li> -->

 
<li {{ (current_page("personalinfo")) ? 'class=active' : '' }}><a href="{{ url('/educationinfo/1')}}"> SAMPLE</a></li>


              </ul>

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}


 
  /*         
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {

    case 'educationinfo' :
    $content    = 'educationinfo.php';  
    break;

    case 'governinfo' :
    $content    = 'governinfo.php';  
    break;

  case 'basicinfo' :
    $content    = 'basicinfo.blade.php'; 
    break;

  default :
    $content    = 'basicinfo.blade.php';
        
}
*/
?>

                   <!--    <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div> -->
                </form>
            
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      


 
@endsection





