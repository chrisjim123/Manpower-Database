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
        <div class="col-sm-10"></div>
                <div class="col-sm-2"><a href="{{ url('/home')}}"  class="pull-right"><button class="btn btn-md btn-success"><i class="glyphicon glyphicon-home"  {{ (current_page("home")) ? 'class=active' : '' }}></i> Home</button></a></div>
<!--         <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" style="size:100px;" src="http://www.gravatar.com/avata?s=100"></a></div>
 -->    </div><br>

    <div class="row">

        </div><!--/col-3-->
        <div class="col-sm-12">
             <ul class="nav nav-tabs">
                <li class="active"><a href="album">Upload Photos</a></li>
                <li><a href="">View Photos</a></li>
              </ul><hr>



      <div class="panel-body">

 
        <h3>Import Banner Form:</h3>
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('/uploadbanner') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


          <input type="file" name="image" required/>
          {{ csrf_field() }}
          <br/>

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button name="submit" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>

        </form>
        <br/>

    </div>




<!--        <h3>Import Gallery Form:</h3>
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('/uploadgallery') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


          <input type="file" name="file" />
          {{ csrf_field() }}
          <br/>

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button name="Import" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>

        </form>
        <br/>

    </div>


 -->


 
            
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      


 
@endsection





