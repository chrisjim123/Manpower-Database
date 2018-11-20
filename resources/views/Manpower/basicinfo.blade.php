

<script>
  $('#basicinfo').addClass('active');
</script>


              
                <hr>
                  <form class="form" action="" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input value="{{$person->firstname}}" type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" disabled="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input value="{{$person->lastname}}" type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" disabled="">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input value="None" type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" disabled="">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input value="09196393274" type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" disabled="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input value="jimegot@yahoo.com.ph" type="email" class="form-control" name="email" id="email" placeholder="you@email.com" disabled="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input value="IT Park Cebu City" type="email" class="form-control" id="location" placeholder="somewhere" disabled="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Religion</h4></label>
                              <input value="Roman Catholic" type="text" class="form-control" name="Roman Catholic" id="password" placeholder="password" disabled="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Civil Status</h4></label>
                              <input value="Single" type="text" class="form-control" name="Single" id="password2" placeholder="password2" disabled="">
                          </div>
                      </div>
   



