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
                <li class="active"><a href="addmanpower">Add New Manpower</a></li>
                <li><a href="uploadmanpower">Upload Manpower List</a></li>
              </ul><hr>


                     <form class="form" action={{URL::to('/newrecord')}} method="post" enctype="multipart/form-data">

                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="container">
                      <label><h4 class="text-center">Upload Profile Picture</h4></label>
                     <!--  <input type="file" class="text-left left-block file-upload"> -->
                     <input required type="file" style=" font-size:19px; height:28.5px;  border: 1px;" name="image"/><br/>
 
  
                      </div><hr>


<!-- Basic Information -->

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input value="" type="text" class="form-control" name="first_name" id="first_name" placeholder="enter first name" title="enter your first name." required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input value="" type="text" class="form-control" name="last_name" id="last_name" placeholder="enter last name" title="enter your last name." required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="middle_name"><h4>Middle Name</h4></label>
                              <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="enter middle name" title="enter your middle name." required>
                          </div>
                      </div>

                 <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="gender"><h4>Gender</h4></label>
                              <select style="height:35px;" class="form-control" name="gender" id="gender" title="enter gender" required>
                              <option value="">Enter your gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              </select>
<!--                               <input type="text" class="form-control" name="gender" id="gender" placeholder="enter gender" title="enter your gender." required>
 -->                          </div>
                      </div>
                             <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="birthdate"><h4>Birth Date</h4></label>
                              <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="enter birthdate" title="enter your birthdate." required>
                          </div>
                      </div>
                             <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="placeofbirth"><h4>Place of Birth</h4></label>
                              <input type="text" class="form-control" name="placeofbirth" id="placeofbirth" placeholder="enter place of birth" title="enter your place of birth." required>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Phone No.</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="address"><h4>Location</h4></label>
                              <input nam type="text" class="form-control" name="address" id="address" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Religion"><h4>Religion</h4></label>
                              <input nam type="text" class="form-control" name="religion" id="religion" placeholder="Religion" title="enter a Religion">
                          </div>
                      </div>

           <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="civil_status"><h4>Civil Status</h4></label>
                              <input nam type="text" class="form-control" name="civil_status" id="civil_status" placeholder="Civil Status" title="enter a Civil Status">
                          </div>
                      </div>



<!-- Educational Information -->                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="college_school"><h4>Elementary School</h4></label>
                              <input type="text" class="form-control" name="elementary_school" id="elementary_school" placeholder="enter elem. school" title="enter your elem. school." required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="elem_school_year"><h4>School Year</h4></label>
                              <input type="text" class="form-control" name="elem_school_year" id="elem_school_year" placeholder="elem_school_year" title="enter your elem_school_year.">
                          </div>
                      </div>
                   
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="high_school"><h4>High School</h4></label>
                              <input type="text" class="form-control" name="high_school" id="high_school" placeholder="enter high school" title="enter high school." required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="high_school_year"><h4>School Year</h4></label>
                              <input type="text" class="form-control" name="high_school_year" id="high_school_year" placeholder="high_school_year" title="enter your high school_year.">
                          </div>
                      </div>
                                            <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="colloge_school"><h4>College School</h4></label>
                              <input type="text" class="form-control" name="college_school" id="college_school" placeholder="enter your college school" title="enter your college school." required>
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="college_school_year"><h4>School Year</h4></label>
                              <input type="text" class="form-control" name="college_school_year" id="college_school_year" placeholder="college_school_year" title="enter your college school_year.">
                          </div>
                      </div>





<!-- Government Information -->

                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="sss_number"><h4>SSS Number</h4></label>
                              <input type="text" class="form-control" name="sss_number" id="sss_number" placeholder="enter SSS Number" title="enter your SSS Number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="philhealth_number"><h4>PhilHealth Number</h4></label>
                              <input type="text" class="form-control" name="philhealth_number" id="philhealth_number" placeholder="enter Philhealth Number" title="enter your Philhealth Number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="pagibig_number"><h4>Pag-Ibig Number</h4></label>
                              <input type="text" class="form-control" name="pagibig_number" id="pagibig_number" placeholder="enter Pagibig Number" title="enter your Pagibig Number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="tin_number"><h4>TIN Number</h4></label>
                              <input  type="text" class="form-control" name="tin_number" id="tin_number" placeholder="enter TIN Number" title="enter your TIN number if any.">
                          </div>
                      </div>











<!--Company Information -->

                    <div class="form-group">      
                    <div class="col-xs-6">
                              <label for="emp_num"><h4>Employee Number</h4></label>
                              <input type="text" class="form-control" name="emp_num" id="emp_num" placeholder="enter Employee Number" title="enter your employee number." required>
                          </div>
                      </div>

                                          <div class="form-group">      
                    <div class="col-xs-6">
                              <label for="card_num"><h4>Card Number</h4></label>
                              <input type="text" class="form-control" name="card_num" id="card_num" placeholder="enter Card Number" title="enter your Card Number." required>
                          </div>
                      </div>


                    <div class="form-group">      
                    <div class="col-xs-6">
                              <label for="company_name"><h4>Company Name</h4></label>
                              <input type="text" class="form-control" name="    " id="company_name" placeholder="enter company name" title="enter your company." required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="company_address"><h4>Company Address</h4></label>
                              <input type="text" class="form-control" name="company_address" id="company_address" placeholder="last name" title="enter your company address." required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="company_phone"><h4>Company Telephone</h4></label>
                              <input type="text" class="form-control" name="company_phone" id="company_phone" placeholder="enter phone" title="enter your company phone number if any." required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="company_email"><h4>Company Email</h4></label>
                              <input type="text" class="form-control" name="company_email" id="company_email" placeholder="enter company email address" title="enter your company email address if any." required>
                          </div>
                      </div>


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="position"><h4>Position</h4></label>
                              <input type="text" class="form-control" name="position" id="position" placeholder="enter Position" title="enter Position." required>
                          </div>
                      </div>


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="date_hired"><h4>Date Hired</h4></label>
                              <input type="date" class="form-control" name="date_hired" id="date_hired" placeholder="enter Date Hired" title="enter Date Hired." required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="status"><h4>Employee Status</h4></label>
                              <input disabled="" value="Active" type="text" class="form-control" name="status" id="status">
                          </div>
                      </div>






                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
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





