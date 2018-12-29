@extends('layouts.app')

@section('content')


<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>
 
 
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"></div>
                <div class="col-sm-2"><a href="{{ url('/home')}}"  class="pull-right"><button class="btn btn-md btn-success"><i class="glyphicon glyphicon-home"  {{ (current_page("home")) ? 'class=active' : '' }}></i> Home</button></a></div>
        </div><br>

    <div class="row">

        </div><!--/col-3-->
        <div class="col-sm-12">
             <ul class="nav nav-tabs">
                <li><a href="addmanpower">Add New Manpower</a></li>
                <li class="active"><a href="Uploadexcel">Upload Manpower List</a></li>
              </ul><hr>

<!-- 
                    <form enctype="multipart/form-data"  class="form" action={{URL::to('/doimport')}} method="post">

                     <input type="hidden" name="_token" value="{{ csrf_token() }}">


                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="file"><h4>Upload Excel File</h4></label>
                              <input name="upload-file" id="file" type="file" class="file-upload" required>
                          </div>
                      </div>
    

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button name="Import" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                </form>


            
              </div>
 -->



      <div class="panel-body">

 
        <h3>Import File Form:</h3>
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('/doimport') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


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

















               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      


 
@endsection





