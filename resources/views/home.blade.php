@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="glyphicon glyphicon-home"> Home</i></div>

 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>
 

<div class="container bootstrap snippet">
              
                    <style>
                            .pagination li{
                                display: inline; 
                            }
                    </style>
                    <br>
                    <div class="col-sm-2"><a href="{{ url('addpersonalinfo')}}"  class="pull-left"><button class="btn btn-md btn-success"><i class="glyphicon glyphicon-plus-sign"  {{ (current_page("addpersonalinfo")) ? '' : '' }}></i> Add New</button></a></div>
                   <br><br>
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
                            <td>{{$per->firstname}}</td>
                            <td>{{$per->middlename}}</td>
                            <td>{{$per->lastname}}</td>
                            <td>{{$per->contact}}</td>
                         
                            <td><a href="personalinfo/{{$per->id}}"><button class="btn btn-sm btn-success"><i class="glyphicon glyphicon-search"> View</i></button></a><button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"> Edit</i></button><button class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"> Delete</i></button></td>
      
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
