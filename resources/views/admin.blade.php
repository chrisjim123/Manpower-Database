@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="glyphicon glyphicon-home"> Home</i></div>
 -->
 


<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>
 
 <center><h2>Welcome Admin</h2></center>

<div class="container bootstrap snippet">



                    <style>

                    #uprall {
                        text-transform:uppercase;
                    }

                    .upr {
                        text-transform:capitalize;
                    }

                            .pagination li{
                                display: inline; 
                            }
                    </style>
                        
                    <div class="container">
                    <form action="{{ URL::to('/search') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                    
                    <div class="input-group">
            
                        <input class="form-control" name="search" placeholder="Search here (First Name, Middle Name or Last Name)" type="text"><span class="input-group-btn"><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
            
                    </div>

                    </form>
                    </div>
 
                  
               <div class="container">
                      <div class="form-group">
                           <div class="col-xs-12">  
                                <br>
                                <a title="Add New Record"  href="{{ url('addmanpower')}}"><button class="btn btn-lg btn-default" type="submit"><i style="color:green;" class="glyphicon glyphicon-plus-sign"  {{ (current_page("addmanpower")) ? '' : '' }}></i></button></a>
                                 <a title="Generate Report"  href="{{ url('exportrecord')}}"><button class="btn btn-lg btn-default" type="submit"><i style="color:green;" class="glyphicon glyphicon-circle-arrow-down"  {{ (current_page("exportrecord")) ? '' : '' }}></i></button></a>                    
                                <a title="Compose Message" href="{{ url('createsms')}}"><button class="btn btn-lg btn-default" type="submit"><i style="color:green;"  class="glyphicon glyphicon-envelope"  {{ (current_page("createsms")) ? '' : '' }}></i></button></a>
                                <a title="Album" href="{{ url('album')}}"><button class="btn btn-lg btn-default" type="submit"><i style="color:blue;"  class="glyphicon glyphicon-picture"  {{ (current_page("album")) ? '' : '' }}></i></button></a>
                               <a title="Delete Record" href="{{ url('deleteall')}}"><button class="btn btn-lg btn-default" type="submit"><i style="color:red;" class="glyphicon glyphicon-trash"  {{ (current_page("deleteall")) ? '' : '' }}></i></button></a>
                                  
                            </div>
                      </div>
                      </div>

<hr>

  <div class="container">














                </div>
            </div>
               </div> 
        </div>
    
    </div>
</div>
@endsection







<script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }

      
</script>