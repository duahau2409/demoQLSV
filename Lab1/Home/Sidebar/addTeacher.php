<?php
    session_start();
    include '../../config.php';
    if (isset($_POST['submit']) && $_POST['teacherCode'] != '' && $_POST['name'] != '' && $_POST['description'] != '') {
        // thực hiện đầy đủ khi người dùng đã điền đầy đủ thông tin
        $teacherCode = $_POST['teacherCode'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];

        $dst = '../Image' . $image;
        $dst_db= 'Image/' . $image;
        move_uploaded_file($_FILES['image']['name'], $dst);

        $check = "SELECT * FROM teachers Where teacherCode = '$teacherCode'";
        $check_user = mysqli_query($conn, $check);

        $row_conut = mysqli_num_rows($check_user);
        if($row_conut==1 || $row_conut > 1){
            $_SESSION["thongbao"] = "Teacher Code Already Exits. Try again.";
            header("location:submitTeacher.php");
        }else{
            $sql = "INSERT INTO teachers (teacherCode, name, description, image) VALUES ('$teacherCode','$name','$description','$dst_db') ";
            $result = mysqli_query($conn,$sql);
            $_SESSION["thongbao"] = "Success";
            header("location:submitTeacher.php");
        }
    } else {
        $_SESSION["thongbao"] = "Please enter full information";
        header("location:submitTeacher.php");
    }
?>

