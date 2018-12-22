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
                <li class="active"><a href="addmanpower">Send Message to Manpower</a></li>
              </ul><hr>


                     <form class="form" action={{URL::to('/sendsms')}} method="post">

                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
<!--  -->
 
                           <div class="col-sm-12">
                            <textarea name="message" responsive name="myTextBox" cols="100" rows="10" placeholder="Enter message here..."></textarea>
                            <br />

                           </div>
 <script>                 
textarea {
  max-width: 100%;
}
</script>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-share"></i> Send</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                </form>
            
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      


 
@endsection





