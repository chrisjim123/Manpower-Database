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
        
                <li class="active"><a href="Uploadexcel">Export Records</a></li>
              </ul><hr>


        <br/>

          
          <h3>Export Manpower Records:</h3>
          <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">     
            <a href="{{ route('export_excel.xls') }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>
          <a href="{{ route('export_excel.xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
          <a href="{{ route('export_excel.csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
          </div>




            
              </div>

















               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      


 
@endsection





