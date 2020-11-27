<?php
session_start();
include ('connection.php');

//get the user id of the note through Ajax
$note_id = $_POST['id'];
//run a query to delete empty notes
$sql = "DELETE FROM notes WHERE id='$note_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}
//run a query to look for notes corresponding to user_id

//shows notes or alert message

?>