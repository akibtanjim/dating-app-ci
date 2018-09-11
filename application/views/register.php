<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Dating App || Registration</title>
  </head>
  <body>
    <div class="container">
      <?php
          echo form_open(base_url() . 'user/create', array(
              'method' => 'post',
              'id' => 'registration_form',
              'enctype' => 'multipart/form-data',
              'class'=>'form-horizontal',
              'role'=>'form'
          ));
      ?>
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6 offset-md-2">
                  <h2>Register New User</h2>
              </div>
          </div>
          <hr>
          <?php
            if($this->session->flashdata('errors') !== null){
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?php echo $this->session->flashdata('errors') ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
            }
          ?>
          <?php
            if($this->session->flashdata('success') !== null){
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><?php echo $this->session->flashdata('success') ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
            }
          ?>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <center>
                            <img class="img-responsive img-border blah"src="<?php echo base_url(); ?>uploads/others/user.png" />
                        </center><br>
                        <span class="btn btn-default" style="margin-left: 22%;">
                            <input type="file" width="100" height="100" id="image" accept="image/*" name="image" class="form-control imgInp">
                        </span>
                  </div>
                  <span id="img"></span>
              </div>
              <div class="col-md-3">
              </div>
          </div>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="name">Name</label>
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <input type="text" name="name" class="form-control" id="name"
                                 placeholder="John Doe" required autofocus>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="email">Email</label>
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <input type="text" name="email" class="form-control" id="email"
                                 placeholder="you@example.com" required autofocus>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="dob">Date of Birth</label>
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <input type="date" name="dob" class="form-control" id="dob"
                                 placeholder="22/08/1992" required>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="gender">Gender</label>
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <select name="gender" class="form-control" id="gender" required>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="password">Password</label>
              </div>
              <div class="col-md-9">
                  <div class="form-group has-danger">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <input type="password" name="password" class="form-control" id="password"
                                 placeholder="Password" required>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3 field-label-responsive">
                  <label for="password">Confirm Password</label>
              </div>
              <div class="col-md-9">
                  <div class="form-group">
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <input type="password" name="password-confirmation" class="form-control"
                                 id="password-confirm" placeholder="Password" required>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-9">
                  <button type="submit" class="btn btn-success float-right">Register</button>
              </div>
          </div>
          

          <input type="hidden" name="lat" id="lat" value="0.00">
          <input type="hidden" name="long" id="long" value="0.00">
      <?php 
        form_close(); 
      ?>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function (){
        getLocation();
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getPosition);
            } else { 
                alert("Geolocation Not Supported");
            }
        }

        function getPosition(position) {
            $("#lat").val(position.coords.latitude);
            $("#long").val(position.coords.longitude);
        }
        function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('.blah').attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
        }
        $('.imgInp').on('change', function () {
          console.log(this);
          readURL(this);
        });
      })
    </script>
  </body>
</html>