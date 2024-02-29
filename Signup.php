<?php 
include 'connection.php';

?>




<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='form.css'>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="validation.js" defer></script>

</head>

<body>

    <div>
        <h1>NPD COTRACO LTD</h1>
    </div>
    <div>
        <center>
            <h2>Employees Management System</h2>

            <fieldset>
                <form action="process_signup.php" method="POST" id="signup" novalidate>
                    <input type="text" name="username" id="username" placeholder="Enter Your Username"><br><br>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email"><br><br>
                    <input type="password" name="password1" id="password1" placeholder="Enter Your Password"><br><br>
                    <input type="password" name="password2" id="password2" placeholder="Confirm your Password"><br>
                    <button type="submit">SignUp</button><br><br>
                    Click<a href="signin.html">here</a> If You Already have an Account

                </form>
            </fieldset>
        </center>
    </div>

</body>

</html>