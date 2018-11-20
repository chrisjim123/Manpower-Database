@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 -->
<!--  
                <div class="card-body"> -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<div class="container bootstrap snippet">
              
                    <style>
                            .pagination li{
                                display:    inline; 
                            }
                    </style>
                    <a href="personalinfo"><button class="button button-sample">Add New Manpower</button></a>

                    <table id="pagination" class="table table-hover table-striped table-responsive">
                    <thead> 
                            <th>#</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        
                    </thead>
                    <tbody> 
                     @foreach($data as $per)
                    <tr>    
                            <td>{{$loop->index}}</td>
                            <td>{{$per->firstname}}</td>
                            <td>{{$per->middlename}}</td>
                            <td>{{$per->lastname}}</td>
                            <td>{{$per->created_at}}</td>
                         
                            <td><a href="personalinfo/{{$per->id}}"><button>View</button></a><button>Edit</button><button>Delete</button></td>
      
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    
                    {{$data->links()}}
<!--                 </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
