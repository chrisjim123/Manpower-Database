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
            
                        <input class="form-control" name="search" placeholder="Search here" type="text"><span class="input-group-btn"><button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
            
                    </div>

                    </form>
                    </div>

                      <div class="form-group">
                           <div class="col-xs-12">  
                                <br>
                                <a href="{{ url('addmanpower')}}"><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-import"  {{ (current_page("addmanpower")) ? '' : '' }}></i> Add new Record</button></a>
                                 <a href="{{ url('exportrecord')}}"><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-export"  {{ (current_page("exportrecord")) ? '' : '' }}></i> Export Records</button></a>                    
                                <a href="{{ url('createsms')}}"><button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-plus-sign"  {{ (current_page("createsms")) ? '' : '' }}></i> Compose Message</button></a>
                                  
                            </div>
                      </div>
  <div class="container">
                   <br><br>
                   @if(isset($data))
                    <table id="pagination" class="table table-hover table-striped table-responsive">
                    <thead> 
                            <th>#</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Action</th>
                        
                    </thead>
                    <tbody> 
                     @foreach($data as $per)
                    <tr>    
                            <td>{{$loop->index+1}}</td>
                            <td id="upr">{{$per->firstname}}</td>
                            <td id="upr">{{$per->middlename}}</td>
                            <td id="upr">{{$per->lastname}}</td>
                            <td id="upr">{{$per->contact}}</td>
                         
                            <td><a href="personalinfo/{{$per->id}}"><button class="btn btn-sm btn-success" title="view manpower info."><i class="glyphicon glyphicon-search"> View</i></button></a><button class="btn btn-sm btn-primary" title="edit manpower info."><i class="glyphicon glyphicon-pencil"> Edit</i></button><button class="btn btn-sm btn-danger" title="delete manpower record."><i class="glyphicon glyphicon-trash"> Delete</i></button><a href="sendsms/{{$per->id}}"><button class="btn btn-sm btn-success" title="send text message."><i class="glyphicon glyphicon-envelope"> Message</i></button></td>
      
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    
                    {{$data->links()}}
                    @else
                    {{ $message }}
                    @endif
                </div>
            </div>
               </div>
        </div>
    </div>
</div>
@endsection





