<?php
include 'connection.php';
session_start();

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $delete=$mysqli->query("DELETE FROM employees WHERE id='$id'") or die ("delete_failed . $mysqli->error ." );
    
    if($delete){
        echo" employee deleted sucessfully";
        header("location: index.php");
    }
}
?>