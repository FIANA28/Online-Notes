<?php
session_start(); 
if(!isset($_SESSION['user_id'])){
  header("location: index.php");
}
include ('connection.php');
$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $username = $row['username'];
  $email = $row['email'];
}else{
  echo "There was an error retrieving the username and email from the database";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling.css">
        <style> 
        #container{
            margin-top: 100px;
        }
        #allNotes, #done, #notePad{
            display: none;
        }
        .buttons{
            margin-bottom: 15px;
        }

        .change_edit {
          text-decoration: underline; 
          cursor: pointer; 
        }
        </style>
  </head>
  <body>
    <!-- Navigation bar -->
      <nav role="navigation" class="navbar navbar-custom navbar-expand-lg fixed-top navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Online Notes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="mainpageloggedin.php">My Notes</a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Logged in as <b><?php echo $username; ?></b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?logout=1">Log out</a>
                </li>
              </ul>
            </div>
        </div>
      </nav>
      <!-- Container-->
        <div class="container" id="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                  <h2>General Account Settings: </h2>
                  <div class="table-responsive">
                      <table class="table table-hover table-sm table-bordered">
                          <tr>
                            <td>Username</td>
                            <td><?php echo $username; ?></td>
                            <td data-target="#updateusername" data-toggle="modal"><span class="change_edit">Edit</span></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><?php echo $email; ?></td>
                            <td data-target="#updateemail" data-toggle="modal"><span class="change_edit">Edit</span></td>
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td>hidden</td>
                            <td data-target="#updatepassword" data-toggle="modal"><span class="change_edit">Edit</span></td>
                          </tr>
                      </table>
                  </div>
                </div>
            </div>
        </div>
      <!-- Update username -->
      <form method="post" id="updateusernameform">
        <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="myModalLabel"> Edit Username: </h4>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">

                <!-- update username message from PHP file -->
                <div id="updateusernamemessage"></div>

                <div class="form-group">
                  <label for='username'>Username: </label>
                  <input class="form-control" type="text" name="username" id="username" value="<?php echo $username; ?>" maxlength="30">
                </div>
              </div>
              <div class="modal-footer">
                <input class="btn change-color" name="updateusername" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>

       <!-- Update email -->
       <form method="post" id="updateemailform">
        <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="myModalLabel"> Enter new email: </h4>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">

                <!-- update email message from PHP file -->
                <div id="updateemailmessage"></div>

                <div class="form-group">
                  <label for="email">Email: </label>
                  <input class="form-control" type="email" name="email" id="email" value="<?php echo $email ?>" maxlength="50">
                </div>
              </div>
              <div class="modal-footer">
                <input class="btn change-color" name="updateemail" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>

       <!-- Update password -->
       <form method="post" id="updatepasswordform">
        <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="myModalLabel"> Enter Current and New password: </h4>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">

                <!-- update password message from PHP file -->
                <div id="updatepasswordmessage"></div>

                <div class="form-group">
                  <label for="currentpassword" class="sr-only">Your Current Password: </label>
                  <input class="form-control" type="password" name="currentpassword" id="currentpassword" placeholder="Your Current Password" maxlength="30">
                </div>
                <div class="form-group">
                <label for="password" class="sr-only">Choose a password: </label>
                  <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                </div>
                <div class="form-group">
                <label for="password2" class="sr-only">Confirm password: </label>
                  <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                </div>

              <div class="modal-footer">
                <input class="btn change-color" name="updatepassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>
   
      <!-- Footer -->
      <div class="footer">
        <div class="container-fluid">
          <p>Anna Soini Copyright &copy; <?php $today = date("Y"); echo $today?>.</p>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="profile.js"></script>
  </body>
</html>