<?php
include'connection.php';
// validation for name
if (empty($_POST["username"])){
    die ("Username is required");
}

// validation for email


if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
    die ("Valid email is required");
}

// validation for password

if (strlen($_POST["password1"]) < 8)  {

    die("password must be at least 8 characters");
}

if( ! preg_match("/[a-z]/i",$_POST["password1"] )) {
    die("password must contain at least one letter");
}

if( ! preg_match("/[0-9]/",$_POST["password1"] )) {
    die("password must contain at least one number");
}


if( $_POST["password1"] !== $_POST["password2"]) {

    die ("password must match");
}

// hashing password

$password_hash= password_hash($_POST["password1"], PASSWORD_DEFAULT);

// $mysqli = require__DIR__ . "/connection.php";



// insert into table in database
$sql = "INSERT INTO signup( username, email, password_hash) VALUES(?,?,?)";

$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)) {
    die("SQL error:". $mysqli->error);
}

$stmt->bind_param("sss",
                $_POST["username"],
                $_POST["email"],
                $password_hash );

if($stmt->execute()){

header("Location:signup_successful.html");
   
}
else{
    if($mysqli->errno  === 1062){
        die("The email has taken");
    }
    else{
    die($mysqli->error ."". $mysqli->errno);
}
}

// print_r($_POST);
// var_dump($password_hash);
?>