<?php
    session_start();
    include '../../config.php';
    if($_GET['student_id']){
        $student_id=$_GET['student_id'];

        $sql="DELETE FROM students WHERE id='$student_id'";

        $result = mysqli_query($conn,$sql);
        if($result) {
            header("location:viewStudent.php");
        }
    }
?>

