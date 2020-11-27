<?php
session_start();

if(!isset($_SESSION['user_id'])){
  header ("location: index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Notes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styling.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <style> 
        #container{
            margin-top: 120px;
        }
        #notePad, #allNotes, #done, .delete {
            display: none;
        }
        .buttons{
            margin-bottom: 15px;
        }
        button {
          margin-right: 7px;
        }
        textarea {
            width: 100%;
            max-width: 100%;
            font-size: 16px; 
            line-height: 1.5em; 
            color: hsl(177, 70%, 41%);
            border-left-width: 20px; 
            border-color: hsl(177, 70%, 41%);
            background-color: #FBEFFF;
            padding: 10px;
        }
        .noteheader{
          border: 1px solid grey;
          border-radius: 10px;
          margin-bottom: 10px; 
          cursor: pointer; 
          padding: 0 10px; 
          background: linear-gradient(#FFFFFF,#FBEFFF); 
        }
        .text{
          font-size: 20px;
          overflow: hidden;
          white-space: nowrap; 
          text-overflow: ellipsis; 
        }

        .timetext{
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis; 
        }
        .notes{
          margin-bottom: 100px; 
        }
        span {
          /* color: hsl(177, 70%, 41%); */
          color: red; 
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
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="mainpageloggedin.php">My Notes<span class="sr-only">(current)</span></a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Logged in as <b><?php echo $_SESSION['username'] ?></b></a>
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
          <!-- Alert Message -->
           <div id="alert" class="alert alert-danger collapse">
            <a class="close" data-dismiss="alert">&times;</a>
            <p id="alertContent"></p>
           </div>
           <div class="row">
               <div class="col-md-offset-3 col-md-9">
                  <div class="buttons">
                      <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note</button>
                      <button id="edit" type="button" class="btn btn-info btn-lg">Delete</button>
                      <button id="done" type="button" class="btn change-color btn-lg">Done</button>
                      <button id="allNotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                  </div>
                  <div id="span"><span class="d-block">Click on note to edit it!</span></div>
                  <div id="notePad">
                      <textarea rows="8"></textarea>
                  </div>
                  <div id="notes" class="notes">
                      <!-- Ajax call to PHP file -->
                  </div>
               </div>
           </div>
        </div>
      <!-- Footer -->
      <div class="footer">
        <div class="container-fluid">
          <p>Anna Soini Copyright &copy; <?php $today = date("Y"); echo $today?>.</p>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>
  </body>
</html>