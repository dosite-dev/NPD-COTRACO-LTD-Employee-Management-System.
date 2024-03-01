<?php
include 'connection.php';
session_start();
// if (!isset($_SESSION['username'])) {
// 	echo"<script>

// //alert('not identified')
// //	</script>";
// 	header("location:signin.php");
// }
// print_r($_SESSION);

if(isset($_SESSION["user_id"])){
    $sql = "SELECT * FROM signup WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>
    <script src='add_employee.js'></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body>


    <div>
        <h1>NPD COTRACO LTD</h1>

    </div>

    <div>
        <center>
            <div>
            <?php if(isset($user)): ?>

            <p >WELCOME <?= $user["username"]?>.</p>
            <a href="logout.php">logout</a>


            <?php else:
                header("location:signin.php");?>
            <!-- <p><a href="signin.php">SignIn</a></p> -->

            <?php endif; ?>
            </div>

            <h2>Employees Management System</h2>

            <button id="btn"  onclick="toggleMoreInfo()">Add Employee</button>


            <div class="add-employee" id="add">
                <fieldset class="form" id="form">
                    <h3>Add Employees Form</h3>
                    <form action="" method="POST">
                        FirstName: <input type="text" id="firstname" name="firstname"  required><br><br>
                        LastName: <input type="text" id="lastname" name="lastname"  required><br><br>
                        ID_number: <input type="number" id="identification_card" name="identification_card"  required><br><br>
                        Contract: <input type="text" id="contra" name="contra"  required><br><br>
                        JobTitle: <input type="text" id="jobtitle" name="jobtitle"  required><br><br>
                        Salary: <input type="number" id="salary" name="salary"  required><br><br>
                        <button type="submit" name="add"  style="padding:10px; background-color: #ad7305; border:none; border-radius:5px;" >ADD</button>
                    </form>
                </fieldset>
            </div>
            <?php 
            if(isset($_POST['add'])){
                $fn=$_POST['firstname'];
                $ln=$_POST['lastname'];
                $ic=$_POST['identification_card'];
                $cc=$_POST['contra'];
                $jt=$_POST['jobtitle'];
                $sry=$_POST['salary'];


                $insert=$mysqli->query("INSERT INTO employees(firstname,lastname,identification_card,contra,job_title,salary)
                VALUES('$fn','$ln','$ic','$cc','$jt','$sry')");

if ($insert) {
		
    echo "<script>
   alert('Employee added sucessfully')
    </script>";


}else{
    echo "<script>
   alert(''Add employee failed: " . $mysqli->error . "'')
    </script>";

}
 }
            ?>

            
                <table border="1" style="border-collapse:collapse;cellpadding:5px" >
                    <tr style="background-color:#ad7305;">
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Identification_Card_Number</th>
                        <th>Contract</th>
                        <th>Job_Title</th>
                        <th>Salary</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php 
                    $select=$mysqli->query("SELECT * FROM employees");
                    while($row=mysqli_fetch_array($select)){
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $ident=$row['identification_card'];
                        $cont=$row['contra'];
                        $jt=$row['job_title'];
                        $sl=$row['salary'];
                        $id=$row['id']

                         ?>
                        <tr>
                            <td><?php echo"$firstname"?></td>
                            <td><?php echo"$lastname"?></td>
                            <td><?php echo"$ident"?></td>
                            <td><?php echo"$cont"?></td>
                            <td><?php echo"$jt"?></td>
                            <td><?php echo"$sl"?></td>
                            <td><a href="update.php?id=<?php echo $id;?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $id;?>">Remove</a></td>

                        </tr>
                        <?php

                    }
                    ?>

                </table>
            </center>




    </div>
</body>

</html>