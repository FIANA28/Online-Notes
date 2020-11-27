  <?php
//  <!-- Start session -->
session_start();
// <!-- Connect to the database  -->
include ('connection.php');
// <!-- Check user inputs -->
//     <!-- Define error messages -->
$missingUsername = '<p>Please enter a username!</p>';
$missingEmail = '<p>Please enter your email address!</p>';
$invalidEmail = '<p>Please enter a valid email address!</p>';
$missingPassword = '<p>Please enter a Password!</p>';
$invalidPassword = '<p>Your password should be at least 6 characters long and include one capital letter and one number!</p>';
$differentPassword = '<p>Passwords don\'t match!</p>';
$missingPassword2 = '<p>Please confirm your password</p>';
//     <!-- Get username, email, password, password2 -->
// Get username
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
// Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
} 
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
// <!-- No errors -->
//     <!-- Prepare variables for the queries -->
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
// $password = md5($password);
// hashing a password
$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters

// If username exists in the users table print error -->
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
    // echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>'; exit;
}
// If email exists in the users table print error -->
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>'; exit;
}

//Insert user details in the users table
$sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '')";
$result = mysqli_query($link, $sql);
if(!$result){
echo '<div class="alert alert-danger">Käyttäjätietojen lisäämisessä tietokantaan tapahtui virhe!</div>'; 
} else {
    echo "<div class='alert alert-success'>Kiitos rekisteröitymisestäsi!</div>";
}


// <!-- Creare a unique activation code -->
// $activationKey = bin2hex(openssl_random_pseudo_bytes(16));
//byte: unit of data - 8 bits
//bit: 0 or 1
//16 bytes = 16*8 = 128 bits
//(2*2*2*2)*2*2*2*2*...*2 (called base)
//16*16*...*16
//32 characters

// <!-- Insert user details and activation code in the users table -->
// $sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
// $result = mysqli_query($link, $sql);
// if(!$result){
//     echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; exit;
// }
// <!-- Send to the user and email with a link to activate.php with their email and activation code -->
// $message = "Please click on this link to activate your account:\n\n";
// $message .= "http://localhost:8888/Notes%20App/activate.php?email=" . urlencode($email) . "&key=$activationKey";
// if(mail($email, 'Confirm your Registration', $message, 'From:'.'soinia4@gmail.com')){
//     echo "<div class='alert alert-success'>Thank you for registering! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
// }
  ?>