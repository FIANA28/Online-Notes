<?php
session_start();
include ('connection.php');

// <!-- If user_id or reset key is missing show an error -->
if(!isset($_GET['user_id']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>'; exit;
}
// <!-- else -->
//     <!-- Store them in two variables -->
$user_id = $_POST['user_id'];
$key = $_POST['key'];
$time = time() - 86400;
//     <!-- Prepare variables for the query -->
$user_id=
mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);
// Run Query: check combination of user_id & key exists and less than 24 old
$sql = "SELECT users_id FROM forgotpassword WHERE resetkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
$result = mysqli_query($link, $sgl);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
// if combination does not exist
//show an error message
$count = mysqli_num_rows($result);
if($count !== 1){
    echo '<div class="alert alert-danger">Please try again!</div>';
    exit;
}
//  Define error messages
$missingPassword = '<p>Please enter a Password!</p>';
$invalidPassword = '<p>Your password should be at least 6 characters long and include one capital letter and one number!</p>';
$differentPassword = '<p>Passwords don\'t match!</p>';
$missingPassword2 = '<p>Please confirm your password</p>';

// Get passport
//Get passwords
if(empty($_POST["password"])){
    $errors .=$missingPassword;
}elseif(!(strlen($_POST["password"])>6 
    and preg_match('/[A-Z]/',$_POST["password"]) 
    and preg_match('/[0-9]/',$_POST["password"])
)
){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        //     <!-- Store errors in errors variable -->
        $password2 = filter_var($_POST["password2"],FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//     <!-- If there are any errors print error -->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

// prepare variables for the query
$password = mysqli_real_escape_string($link, $password);
// $password = md5($password);
// hashing a password
$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters
$user_id = mysqli_escape_string($link, $$user_id);

//Run Query: Update users password in the users table 
$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was a problem storing the new password in the database!</div>';
    exit;
}
// set the key status to "used" in the forgotpassword table to prevent the key from being use twice
$sql = "UPDATE fotgotpassword SET status='used' WHERE resetkey='$key' AND user_id='$user_id";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
}else{
    echo '<div class="alert alert-success">Your password has been updated successfully! <a href="index.php">Login</a></div>';
}
?>