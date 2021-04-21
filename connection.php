<?php
//localhost version
// <!-- Connect to the database  -->
// $link = mysqli_connect("localhost", "user", "PASSWORD", "db");
// checking if database is connected
// if(mysqli_connect_error()){
    // die('ERROR: Unable to connect:' . mysqli_connect_error());
    // echo "<script>window.alert('Connection succesfull!')</script>";
// }
//Azure version
// Connect to the database 
$link = mysqli_connect("dbhost", "azure", "PASSWORD", "db");
// checking if database is connected
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error());
    echo "<script>window.alert('Connection succesfull!')</script>";
}
?>
