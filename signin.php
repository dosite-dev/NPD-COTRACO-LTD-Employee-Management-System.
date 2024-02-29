<?php 
session_start();
$mysqli= new mysqli("localhost","root","","employees_management") or die("connection_aborted");

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql = sprintf("SELECT * FROM signup WHERE email='%s'",
    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
if($user){
    if(password_verify($_POST["password"], $user["password_hash"])){
        session_start();
        session_regenerate_id();

        $_SESSION["user_id"]=$user["id"];
        header("location:index.php");
        exit;
    }
}
$is_invalid = true;

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='form.css'>
    <script src='main.js'></script>
</head>

<body>
    <div>
        <h1>NPD COTRACO LTD</h1>
    </div>
    <div>
        <center>
            <h2>Employees Management System</h2>

            <fieldset>
                <?php if($is_invalid): ?>
                <em>INVALID LOGIN</em>
                <?php  endif; ?>
                <form action="" method="POST">
                    <input type="email" name="email" placeholder="Enter Your Email"
                        value="<?= htmlspecialchars($_POST["email"] ?? "" )?>"><br><br>
                    <input type="password" name="password" placeholder="Enter Your Password"><br><br>
                    <button type="submit">SignIn</button><br><br>
                    Click<a href="Signup.php">here</a> To Create Account

                </form>
            </fieldset>
        </center>
    </div>

</body>

</html>