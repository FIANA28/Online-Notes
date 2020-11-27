
<?php
session_start();
include ('connection.php');

//Logout
include ('logout.php');
//remember me
// include ('remember.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling.css">
    
    <title>Online Notes</title>
  </head>
  <body>
    <!-- Navigation bar -->
      <nav role="navigation" class="navbar navbar-custom navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Online Notes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#loginModal" data-toggle="modal">Login</a>
                </li>
              </ul>
            </div>
        </div>
      </nav>
      <!-- Jumbotron with Sign up button -->
      <div class="jumbotron" id="myContainer">
        <h1>Online Notes App</h1>
        <p>Take notes with you wherever you go.</p>
        <p>Easy to use, accesible and protected!</p>
        <button type="button" class="btn btn-lg change-color signup" data-target="#signupModal" data-toggle="modal">Sign Up for free</button>
      </div>

      <!-- Login Form -->
      <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="myModalLabel"> Login: </h4>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">

                <!-- Login message from PHP file -->
                <div id="loginmessage"></div>

                <div class="form-group">
                  <label for="loginemail" class="sr-only">Email:</label>
                  <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email Address" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="loginpassword" class="sr-only">Password:</label>
                  <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                </div>  
                <div class="checkbox">
                    <label class="checkbox">
                      <input type="checkbox" name="rememberme" id="rememberme"> Remember me 
                    </label>
                    <a class="float-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                  Forgot Password?
                    </a>
                </div>
              </div>
              <div class="modal-footer">
                <input class="btn change-color" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-default float-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
              </div>
            </div>
          </div>
        </div>
      </form>
       <!-- Sign Up Form -->
      <form method="post" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="myModalLabel"> Sign Up today and Start using Online Notes App!</h4>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <!-- Sign up message from PHP file -->
                <div id="signupmessage"></div>

                <div class="form-group">
                  <label for="username" class="sr-only">Username:</label>
                  <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email:</label>
                  <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="password" class="sr-only">Password:</label>
                  <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="32">
                </div>
                <div class="form-group">
                  <label for="password2" class="sr-only">Confirm password:</label>
                  <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="32">
                </div>
              </div>
              <div class="modal-footer">
                <input class="btn change-color" name="signup" type="submit" value="Sign up">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Forgot Password Form -->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="myModalLabel"> Forgot Password? Enter your email address: </h4>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">

                <!-- Forgot password message from PHP file -->
                <div id="forgotpasswordmessage"></div>

                <div class="form-group">
                  <label for="forgotemail" class="sr-only">Email:</label>
                  <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email Address" maxlength="50">
                </div>
              </div>
              <div class="modal-footer">
                <input class="btn change-color" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Footer -->
      <div class="footer">
        <div class="container">
          <p>Anna Soini Copyright &copy; <?php $today = date("Y"); echo $today?>.</p>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js"></script>
  </body>
</html>