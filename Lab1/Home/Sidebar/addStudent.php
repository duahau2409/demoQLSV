<?php
    session_start();
    include '../../config.php';
    if (isset($_POST['submit']) && $_POST['sudentCode'] != '' && $_POST['username'] != '' && $_POST['class'] != '' && $_POST['email'] != '') {
        // thực hiện đầy đủ khi người dùng đã điền đầy đủ thông tin
        $sudentCode = $_POST['sudentCode'];
        $username = $_POST['username'];
        $class = $_POST['class'];
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["thongbao"] = "Incorrect email";
            die();
        }


        $check = "SELECT * FROM students Where sudentCode = '$sudentCode'";
        $check_user = mysqli_query($conn, $check);

        $row_conut = mysqli_num_rows($check_user);
        if($row_conut==1 || $row_conut > 1){
            $_SESSION["thongbao"] = "Student Code Already Exits. Try again.";
            header("location:submitStudent.php");
        }else{
            $sql = "INSERT INTO students (sudentCode, username, class, email) VALUES ('$sudentCode','$username','$class','$email') ";
            $result = mysqli_query($conn,$sql);
            $_SESSION["thongbao"] = "Success";
            header("location:submitStudent.php");
        }
    } else {
        $_SESSION["thongbao"] = "Please enter full information";
        header("location:submitStudent.php");
    }
?>

