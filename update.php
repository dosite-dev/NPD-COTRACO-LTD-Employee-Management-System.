<?php
include'connection.php';
session_start();


if(isset($_GET['id'])){
    $row = $_GET['id'];
    $select2=$mysqli->query(" SELECT * FROM employees WHERE id='$row'");

    while($row=mysqli_fetch_array($select2)){
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $ident=$row['identification_card'];
        $cont=$row['contra'];
        $jt=$row['job_title'];
        $sl=$row['salary'];

}
}
if(isset($_POST['update'])){
    $fn=$_POST['firstname'];
    $ln=$_POST['lastname'];
    $ic=$_POST['identification_card'];
    $cc=$_POST['contra'];
    $jot=$_POST['jobtitle'];
    $sry=$_POST['salary'];

    $stmt = $mysqli->prepare("UPDATE employees SET firstname=?, lastname=?, identification_card=?, contra=?, job_title=?, salary=? WHERE id=?");
    $stmt->bind_param("ssssssi", $fn, $ln, $ic, $cc, $jot, $sry, $row);

    if($stmt->execute()){
        echo "updated successfully";
        header("location: index.php");
    }
    else{
        echo "update failed. Error: " . $mysqli->error;
    }

    $stmt->close();

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

    <center>
        <h2>Employees Management System</h2>

        <fieldset class="form" id="form">
            <h3>Update Employees Form</h3>
            <form action="" method="POST">
                FirstName: <input type="text" id="firstname" name="firstname" value="<?php echo $firstname ?>"required><br><br>
                LastName: <input type="text" id="lastname" name="lastname" value="<?php echo $lastname?>" required><br><br>
                ID_number: <input type="number" id="identification_card" name="identification_card" value="<?php echo $ident?>"  required><br><br>
                Contract: <input type="text" id="contra" name="contra" value="<?php echo $cont ?>" required><br><br>
                JobTitle: <input type="text" id="jobtitle" name="jobtitle" value="<?php echo $jt?>" required><br><br>
                Salary: <input type="number" id="salary" name="salary" value="<?php echo $sl?>" required><br><br>
                <button type="submit" name="update"
                    style="padding:10px; background-color: #ad7305; border:none; border-radius:5px;">UPDATE</button>
            </form>
        </fieldset>

    </center>
</body>

</html>