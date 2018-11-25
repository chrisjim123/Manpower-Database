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


                  <form class="form" action="" method="post" id="registrationForm">

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="pagibig_number"><h4>Upload Excel File</h4></label>
                              <input name="pf" type="file" class="file-upload" required>
                          </div>
                      </div>
    

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button name="addmanpowerlist" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
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





