<?php
    session_start();
    include '../config.php';
    if (isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '' ) {
        // thực hiện đầy đủ khi người dùng đã điền đầy đủ thông tin
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password =md5($password);
        $sql = "SELECT * FROM user WHERE username = '$username' AND password='$password'";
        $user = mysqli_query($conn, $sql);
        if( mysqli_num_rows($user) > 0){
            // echo "SUCCESS";
            $_SESSION["user"] = "$username";
            header("location:../Home/Sidebar/admin.php"); 
        }else{
            $_SESSION["thongbao"] = "Incorrect account or password";
            header("location:LogIn.php"); 
        }
    } else {
        $_SESSION["thongbao"] = "Incorrect account or password";
        header("location:LogIn.php");
    }
?>