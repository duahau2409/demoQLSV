<?php
    session_start();
    include '../config.php';
    if (isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['email'] != '' && $_POST['repassword'] != '') {
        // thực hiện đầy đủ khi người dùng đã điền đầy đủ thông tin
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email = $_POST['email'];
        $level = 0;
        if ($password != $repassword) {
            $_SESSION["thongbao"] = "Re-entered password is incorrect";
            header("location:Register.php");
            die();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["thongbao"] = "Incorrect email";
            die();
        }
        $sql = "SELECT * FROM user WHERE username = '$username' ";
        $old = mysqli_query($conn,$sql);
        $password =md5($password); 
        if( mysqli_num_rows($old) > 0){
            $_SESSION["thongbao"] = "Username already exists";
            header("location:Register.php");
            die();
        }
        $sql = "INSERT INTO user (username,password,level) VALUES ('$username','$password','$level')";   
        mysqli_query($conn,$sql);
        $_SESSION["thongbao"] = "Success";
        header("location:../LogIn/LogIn.php");
    } else {
        $_SESSION["thongbao"] = "Please enter full information";
        header("location:Register.php");
    }
?>