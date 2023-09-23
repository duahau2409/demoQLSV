<?php
    session_start();
    include '../../config.php';
    if($_GET['id']){
        $id=$_GET['id'];

        $sql="DELETE FROM teachers WHERE id='$id'";

        $result = mysqli_query($conn,$sql);
        if($result) {
            header("location:viewTeacher.php");
        }
    }
?>

