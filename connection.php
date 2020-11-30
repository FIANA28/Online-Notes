<?php
//localhost version
// <!-- Connect to the database  -->
// $link = mysqli_connect("localhost", "root", "root", "onlinenotes");
// checking if database is connected
// if(mysqli_connect_error()){
    // die('ERROR: Unable to connect:' . mysqli_connect_error());
    // echo "<script>window.alert('Connection succesfull!')</script>";
// }
//Azure version
// Connect to the database 
$link = mysqli_connect("127.0.0.1:50735", "azure", "6#vWHD_$", "onlinenotes");
// checking if database is connected
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error());
    echo "<script>window.alert('Connection succesfull!')</script>";
}
?>
