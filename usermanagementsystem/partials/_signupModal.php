<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  </head>
 <!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#000000; color:white; ">
            <h5 class="modal-title" id="signupModal" style="margin-left:180px;">SignUp Here</h5>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white; ">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         
          <div class="modal-body">
            <form action="partials/_handleSignup.php" method="post">
              <div class="form-group">
                  <b><label for="username">Username</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="firstName">First Name:</label></b>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="lastName">Last name:</label></b>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              <div class="form-group">
                <b><label for="phone">Phone No:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+977</span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your password must contain at least one number, one uppercase letter, and one special character, and should be more than 8 characters.">
              </div>
              <div class="text-left my-2">
                  <b><label for="password1">Confirm Password:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" required data-toggle="password" >
              </div>
              <button type="submit" class="btn btn-success">Sign up</button>
            </form>
            <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a>.</p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>